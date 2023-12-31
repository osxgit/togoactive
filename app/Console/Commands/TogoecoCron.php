<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Carbon\Carbon;

use App\Models\Events\ChallengeAchievementWinner;

class TogoecoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TogoecoCron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is created for togoeco cron to insert records into achievement winner table ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $challenge_id = 81; // this is used for togoparts 

        $slug = 'togoeco2023'; // this is used for togoactive
        $event_details = $events = DB::table("events")->where('slug',$slug)->first();

        $event_id = $event_details->id;

        $challengeObj = DB::connection('mysql_tgp')->table("challenge_detail")->where('cid',$challenge_id)->first();
        
        $conf_start_date = Carbon::parse($challengeObj->start_date);
        $conf_end_date = Carbon::parse($challengeObj->end_date);

        $achUser = []; 

        #Plant-a-Tree
        // manual entry 

        #PCN Champ
        // Manual entry 

        #Heroes of the Earth
        //Be a hero of the earth by contributing to the FIRST 230,000 KM by either cycling or running towards our Community Goal to unlock this achievement. This achievement will be awarded once we cross the 230,000km mark!
        $achievement_id = 8;

        $finisher_arr = DB::connection('mysql_tgp')->table("challenge_strava_activities")
        ->selectRaw('SUM(distance * 0.001) as total_distance, userid')
        ->where('cid',$challenge_id)
        ->whereIn('type',['Ride','VirtualRide','Run'])
        ->where("exclude","!=",1) 
        ->where('start_date_local','>=', $conf_start_date)
        ->where('end_date_local','<=', $conf_end_date)
        ->where('end_date_local','>=', $conf_start_date)
        ->groupBy('userid')
        ->having('total_distance', '>', 230000)
        ->get();

        if($finisher_arr->count() > 0)  {
         
            foreach($finisher_arr as $users){

                $data = DB::table('users')->select('id')
                ->where('tgp_userid',$users->userid)
                ->whereNotExists(function ( $query) use($achievement_id, $event_id) {
                    $query->select(DB::raw(1))
                          ->from('challenge_achievement_winners as caw')
                          ->where('caw.event_id', $event_id)
                          ->whereColumn('caw.user_id', 'users.id')
                          ->where('achievement_id',$achievement_id);
                })
                ->first();
                
                if($data != null){
                    $achUser[] = array("user_id" => $data->id,"team" => '', "achievement_id" => $achievement_id);
                }
               
            }
        }

        #Green Shopper
        // Awarded to participants who purchase at least (3) of #TOGOECO2023 rewards upon signing up for the challenge.
        $achievement_id = 5;

        $green_shopper_event_users = DB::table("event_users")
        ->selectRaw('count(user_rewards.id) as number_of_orders, event_users.user_id')
        ->leftJoin('payments', function ($join) {
            $join->on('event_users.user_id', '=', 'payments.user_id');
            $join->on('event_users.event_id', '=', 'payments.event_id');
            //$join->where("payments.payment_type","registration");
            $join->where("payments.status","successful");
            $join->where("payments.payment_method","Stripe");
        })
        ->leftJoin('user_rewards', function ($join) {
            $join->on('event_users.user_id', '=', 'user_rewards.user_id');
            $join->on('event_users.event_id', '=', 'user_rewards.event_id');
            $join->on("user_rewards.payment_id","payments.id");
        })
        ->whereNotExists(function ( $query) use($achievement_id) {
            $query->select(DB::raw(1))
                  ->from('challenge_achievement_winners as caw')
                  ->whereColumn('caw.event_id', 'event_users.event_id')
                  ->whereColumn('caw.user_id', 'event_users.user_id')
                  ->where('achievement_id',$achievement_id);
        })
        ->where('event_users.event_id',$event_id)
        ->groupBy(["event_users.event_id","event_users.user_id"])
        ->having('number_of_orders', '>', 2)
        ->get();

        if($green_shopper_event_users->count() > 0)  {
            foreach($green_shopper_event_users as $users){
                $achUser[] = array("user_id" => $users->user_id,"team" => '', "achievement_id" => $achievement_id);
            }
        }
       
        #Nature Influencer
        // this is manual

        #Eco Dancer
        // this is manual 

        #Referral Rockstar
        $achievement_id = 14;

        $refferal_event_users = DB::table("event_users")
        ->selectRaw('count(event_users.referral_code) as number_of_referral, event_users.user_id, users.id')
        ->leftJoin('users', function ($join) {
            $join->on('users.id', '=', 'event_users.user_id');
        })
        ->leftJoin('payments', function ($join) {
            $join->on('event_users.user_id', '=', 'payments.user_id');
            $join->on('event_users.event_id', '=', 'payments.event_id');
            $join->where("payments.payment_type","registration");
        })
        ->where('event_users.event_id',$event_id)
        ->where('event_users.referral_code',"!=",'')
        ->whereNotExists(function ( $query) use($achievement_id) {
            $query->select(DB::raw(1))
                  ->from('challenge_achievement_winners as caw')
                  ->whereColumn('caw.event_id', 'event_users.event_id')
                  ->whereColumn('caw.user_id', 'event_users.user_id')
                  ->where('achievement_id',$achievement_id);
        })
        ->groupBy(["event_users.user_id"])
        ->having('number_of_referral', '>', 1)
        ->get();

        if($refferal_event_users->count() > 0)  {
            foreach($refferal_event_users as $users){
                $achUser[] = array("user_id" => $users->user_id,"team" => '', "achievement_id" => $achievement_id);
            }
        }

        #Sprint Runner
        $achievement_id = 3;

        $sprint_runner = DB::connection('mysql_tgp')->table("challenge_strava_activities")
        ->select('userid')
        ->whereIn('type',['Run','VirtualRun'])
        ->where("exclude","!=",1) 
        ->where('start_date_local','>=', $conf_start_date)
        ->where('end_date_local','<=', $conf_end_date)
        ->whereRaw('(distance * 0.001) >= ?', [7])
        ->whereRaw('(moving_time/60) <= ?', [90])
        ->groupBy('userid')
        ->get();

        if($sprint_runner->count() > 0)  {
         
            foreach($sprint_runner as $users){

                $data = DB::table('users')->select('id')
                ->where('tgp_userid',$users->userid)
                ->whereNotExists(function ( $query) use($achievement_id, $event_id) {
                    $query->select(DB::raw(1))
                          ->from('challenge_achievement_winners as caw')
                          ->where('caw.event_id', $event_id)
                          ->whereColumn('caw.user_id', 'users.id')
                          ->where('achievement_id',$achievement_id);
                })
                ->first();

                if($data != null){
                    $achUser[] = array("user_id" => $data->id,"team" => '', "achievement_id" => $achievement_id);
                }
               
            }
        }

        #Sweat of Fitri
        $achievement_id = 2;

        $sweat_of_fitri = DB::connection('mysql_tgp')->table("challenge_strava_activities")
        ->selectRaw('SUM(distance * 0.001) as total_distance, userid')
        ->where('cid',$challenge_id)
        ->whereIn('type',['Ride','VirtualRide','Run'])
        ->where("exclude","!=",1) 
        ->where('start_date_local','>=', '2023-04-22 00:00')
        ->where('end_date_local','<=', '2023-04-22 23:59')
        ->where('end_date_local','>=', '2023-04-22 00:00')
        ->groupBy('userid')
        ->having('total_distance', '>', 14.43)
        ->get();

        if($sweat_of_fitri->count() > 0)  {
         
            foreach($sweat_of_fitri as $users){

                $data = DB::table('users')->select('id')
                ->where('tgp_userid',$users->userid)
                ->whereNotExists(function ( $query) use($achievement_id, $event_id) {
                    $query->select(DB::raw(1))
                          ->from('challenge_achievement_winners as caw')
                          ->where('caw.event_id', $event_id)
                          ->whereColumn('caw.user_id', 'users.id')
                          ->where('achievement_id',$achievement_id);
                })
                ->first();

                if($data != null){
                    $achUser[] = array("user_id" => $data->id,"team" => '', "achievement_id" => $achievement_id);
                }
               
            }
        }

        #Speed Cyclist

        $achievement_id = 4;
      

        $speed_cyclist = DB::connection('mysql_tgp')->table("challenge_strava_activities")
        ->select('userid')
        ->where('cid',$challenge_id)
        ->whereIn('type',['Ride','VirtualRide'])
        ->where("exclude","!=",1) 
        ->where('start_date_local','>=', $conf_start_date)
        ->where('end_date_local','<=', $conf_end_date)
        ->whereRaw('(distance * 0.001) >= ?', [23])
        ->whereRaw('(moving_time/60) <= ?', [90])
        ->groupBy('userid')
        ->get();

        if($speed_cyclist->count() > 0)  {
         
            foreach($speed_cyclist as $users){

                $data = DB::table('users')->select('id')
                ->where('tgp_userid',$users->userid)
                ->whereNotExists(function ( $query) use($achievement_id, $event_id) {
                    $query->select(DB::raw(1))
                          ->from('challenge_achievement_winners as caw')
                          ->where('caw.event_id', $event_id)
                          ->whereColumn('caw.user_id', 'users.id')
                          ->where('achievement_id',$achievement_id);
                })
                ->first();

                if($data != null){
                    $achUser[] = array("user_id" => $data->id,"team" => '', "achievement_id" => $achievement_id);
                }
               
            }
        }

        #Finisher
        $achievement_id = 6;

        $finisher_arr = DB::connection('mysql_tgp')->table("challenge_strava_activities")
        ->selectRaw('SUM(distance * 0.001) as total_distance, userid')
        ->where('cid',$challenge_id)
        ->whereIn('type',['Ride','VirtualRide','Run','VirtualRun'])
        ->where("exclude","!=",1) 
        ->where('start_date_local','>=', $conf_start_date)
        ->where('end_date_local','<=', $conf_end_date)
        ->where('end_date_local','>=', $conf_start_date)
        ->groupBy('userid')
        ->having('total_distance', '>', 53)
        ->get();

        if($finisher_arr->count() > 0)  {
         
            foreach($finisher_arr as $users){

                $data = DB::table('users')->select('id')
                ->where('tgp_userid',$users->userid)
                ->whereNotExists(function ( $query) use($achievement_id, $event_id) {
                    $query->select(DB::raw(1))
                          ->from('challenge_achievement_winners as caw')
                          ->where('caw.event_id', $event_id)
                          ->whereColumn('caw.user_id', 'users.id')
                          ->where('achievement_id',$achievement_id);
                })
                ->first();

                if($data != null){
                    $achUser[] = array("user_id" => $data->id,"team" => '', "achievement_id" => $achievement_id);
                }
               
            }
        }

        #Eco-Active Squad
        $achievement_id = 9;
        
        $team_arr = DB::table("team_users")
        ->leftJoin('teams', function ($join) use($challenge_id) {
            $join->on('teams.id', '=', 'team_users.team_id');
        })
        ->where('event_id',$event_id)
        ->groupBy('team_id')
        ->havingRaw('count(user_id) >= ?', [2])
        ->get();

        // get users using team id 

        if($team_arr->count() > 0)  {
         
            foreach($team_arr as $teams){

                // users data 
                $users_arr = DB::table("team_users")
                ->select(['user_id','team_id','users.tgp_userid'])
                ->leftJoin('users', function ($join) use($challenge_id) {
                    $join->on('users.id', '=', 'team_users.user_id');
                })
                ->where('team_id',$teams->team_id)
                ->whereNotExists(function ( $query) use($achievement_id, $event_id) {
                    $query->select(DB::raw(1))
                          ->from('challenge_achievement_winners as caw')
                          ->whereColumn('caw.user_id', 'team_users.user_id')
                          ->where('caw.event_id', $event_id)
                          ->where('achievement_id',$achievement_id);
                })
                ->get();
              

                // create array of userid and startva userid 
                // this will help to insert which is qualify from starva 
                $tgp_userid_arr = [];
                $userid_from_tgp_usersid_arr = [];
                foreach($users_arr as $users){
                    $tgp_userid_arr[] = $users->tgp_userid;
                    $userid_from_tgp_usersid_arr[$users->tgp_userid] = $users->user_id;
                }

                $activity_user_arr = DB::connection('mysql_tgp')->table("challenge_strava_activities")
                ->selectRaw('SUM(distance * 0.001) as total_distance, userid')
                ->where('cid',$challenge_id)
                ->whereIn('userid', $tgp_userid_arr)
                ->where('start_date_local','>=', '2023-04-22 00:00')
                ->where('end_date_local','<=', '2023-04-22 23:59')
                ->groupBy('userid')
                ->having('total_distance', '>', 5)
                ->get();

    
                if($activity_user_arr->count() > 0)  {
         
                    foreach($activity_user_arr as $users){

                        $user_id = $userid_from_tgp_usersid_arr[$users->userid];
                        $achUser[] = array("user_id" => $user_id,"team" => $teams->team_name, "achievement_id" => $achievement_id);
                        
                    }
                }
               
            }
        }

        #Eco-Challenge Conquerors
        $achievement_id = 10;

        $team_arr = DB::table("team_users")
        ->leftJoin('teams', function ($join) use($challenge_id) {
            $join->on('teams.id', '=', 'team_users.team_id');
        })
        ->where('event_id',$event_id)
        ->groupBy('team_id')
        ->havingRaw('count(user_id) >= ?', [2])
        ->get();

        // get users using team id 

        if($team_arr->count() > 0)  {
         
            foreach($team_arr as $teams){

                // users data 
                $users_arr = DB::table("team_users")
                ->select(['user_id','team_id','users.tgp_userid'])
                ->leftJoin('users', function ($join) use($challenge_id) {
                    $join->on('users.id', '=', 'team_users.user_id');
                })
                ->where('team_id',$teams->team_id)
                ->whereNotExists(function ( $query) use($achievement_id, $event_id) {
                    $query->select(DB::raw(1))
                          ->from('challenge_achievement_winners as caw')
                          ->whereColumn('caw.user_id', 'team_users.user_id')
                          ->where('caw.event_id', $event_id)
                          ->where('achievement_id',$achievement_id);
                })
                ->get();
              

                // create array of userid and startva userid 
                // this will help to insert which is qualify from starva 
                $tgp_userid_arr = [];
                $userid_from_tgp_usersid_arr = [];
                foreach($users_arr as $users){
                    $tgp_userid_arr[] = $users->tgp_userid;
                    $userid_from_tgp_usersid_arr[$users->tgp_userid] = $users->user_id;
                }

                $activity_user_arr = DB::connection('mysql_tgp')->table("challenge_strava_activities")
                ->selectRaw('SUM(distance * 0.001) as total_distance, userid')
                ->where('cid',$challenge_id)
                ->whereIn('userid', $tgp_userid_arr)
                ->whereIn('type',['Ride','VirtualRide','Run','VirtualRun'])
                ->where('start_date_local','>=', $conf_start_date)
                ->where('end_date_local','<=', $conf_end_date)
                ->groupBy('userid')
               
                ->having('total_distance', '>', 53)
                ->get();

    
                if($activity_user_arr->count() > 0)  {
         
                    foreach($activity_user_arr as $users){

                        $user_id = $userid_from_tgp_usersid_arr[$users->userid];
                        $achUser[] = array("user_id" => $user_id,"team" => $teams->team_name, "achievement_id" => $achievement_id);
                        
                    }
                }
               
            }
        }

        #Elite Finisher
        $achievement_id = 7;

        $elite_finisher_arr = DB::connection('mysql_tgp')->table("challenge_strava_activities")
        ->selectRaw('SUM(distance * 0.001) as total_distance, userid')
        ->where('cid',$challenge_id)
        ->whereIn('type',['Ride','VirtualRide','Run','VirtualRun'])
        ->where("exclude","!=",1) 
        ->where('start_date_local','>=', $conf_start_date)
        ->where('end_date_local','<=', $conf_end_date)
        ->where('end_date_local','>=', $conf_start_date)
        ->groupBy('userid')
        ->having('total_distance', '>', 530)
        ->get();

        if($elite_finisher_arr->count() > 0)  {
         
            foreach($elite_finisher_arr as $users){

                $data = DB::table('users')->select('id')
                ->where('tgp_userid',$users->userid)
                ->whereNotExists(function ( $query) use($achievement_id, $event_id) {
                    $query->select(DB::raw(1))
                          ->from('challenge_achievement_winners as caw')
                          ->where('caw.event_id', $event_id)
                          ->whereColumn('caw.user_id', 'users.id')
                          ->where('achievement_id',$achievement_id);
                })
                ->first();

                if($data!=null){
                    $achUser[] = array("user_id" => $data->id,"team" => '', "achievement_id" => $achievement_id);
                }
               
            }
        }

        // adding records into the challenge_achievement_winners table 
        if(!empty($achUser)){
            foreach($achUser as $key=>$auser){

                $achUser[$key]['user_id'] = $auser['user_id'];
                $achUser[$key]['event_id'] = $event_id;
                $achUser[$key]['achievement_id'] = $auser['achievement_id'];
                $achUser[$key]['team'] = $auser['team'] ?? '';
                $achUser[$key]['notified'] = 0;
                $achUser[$key]['created_at'] = date("Y-m-d H:i:s");
            }
            ChallengeAchievementWinner::insert($achUser);
        }

    }
}
