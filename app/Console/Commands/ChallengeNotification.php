<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Log;
use DB;

use App\Models\Events\ChallengeAchievementWinner;
use App\Mail\challengeNotificationEmail;
use Mail;

class ChallengeNotification extends Command
{

    public $client;
	public $headers;
    public $clientId;
    public $url;
    public $secret_token;


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ChallengeNotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to send notification to the user from the tga using tgp api';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $challenge_id = 81; // this is used for togoparts 

        $slug = 'togoeco2023'; // this is used for togoactive

        $achievement_winner_data = ChallengeAchievementWinner::with(['event','user','achievement'])->where('notified',0)->get();

        $data = [];
        if($achievement_winner_data!=null && $achievement_winner_data->count() > 0){
            foreach($achievement_winner_data as $achievement_winner){
                
               
                $data  = array('userid'=> $achievement_winner->user->tgp_userid,
                                'title' => $achievement_winner->achievement->notification_title,
                                'icon' =>  $achievement_winner->achievement->icon,
                                'img' => url('https://static.togoactive.com/'.$achievement_winner->event->images->notification),
                                'message' => $achievement_winner->achievement->notification_description,
                                'slug' => $achievement_winner->event->slug,
                                'winner_notification_id' => $achievement_winner->id
                                );

                        
                // sending notification  
                $this->sendRequest($data);

                // sending email
                $this->sendEmail($achievement_winner->id);
            }
        }
       
       
    }

    public function sendEmail($winner_id){

        if(!empty($winner_id)){

            $achievement_winner_data = ChallengeAchievementWinner::with(['event','event.images','user','achievement'])->where('id',$winner_id)->first()->toArray();
        
            $subject        = $achievement_winner_data['achievement']['email_subject'];
            $email          =  $achievement_winner_data['user']['email'];
            $challenge_url  =  "https://events.togoparts.com/".$achievement_winner_data['event']['slug']."/achievements";

            $mailData = [
                'title'   => $subject,
                'subject' => $subject,
                'data'    => $achievement_winner_data,
                'body'    => '',
                'challenge_url' => $challenge_url
            ];
           
            $response = Mail::to($email)->send(new challengeNotificationEmail($mailData));
        }
    }

    /*
    * This function is used to send notification using API and update winner records 
    */
    public function sendRequest($data){
       
        $this->clientId = env('TGP_CLIENT_ID');
        $this->secret_token = env('TGP_CLIENT_SECRET_TOKEN');
        $this->url = env('TGP_API_URL');

        $token = rand(11111111111,99999999999);
        $hashed_token = sha1_multiple($this->clientId,$this->secret_token,$token);

        $response = Http::asForm()->post($this->url .'api.php', [
			'hashed_token' => $hashed_token,
            'token' => $token,
            'param' => 'sendNotificationTGA',
            'userid' => $data['userid'],
            'title' => $data['title'],
            'icon' => $data['icon'],
            'img' => $data['img'],
            'message' => $data['message'],
            'slug' => $data['slug'],
            'image_icon_tga' => 'Yes'
        ]);

		if ($response->successful()) {
			
            if(isset($data['winner_notification_id']) && !empty($data['winner_notification_id'])){
                ChallengeAchievementWinner::where('id',$data['winner_notification_id'])->update(['notified'=>1]);

            }
            return json_decode($response->body());
		}
		return false;
    }
}
