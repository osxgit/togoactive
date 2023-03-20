<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Redis;

use App\Models\User;
use App\Models\Events\EventUser;
use App\Models\Events\Payment;
use App\Models\Users\StravaAccounts;
use App\Models\Users\UserMedia;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Traits\Api\SendResponse;


class UserController extends Controller
{
    use SendResponse;

    public function create(Request $request){
        try {
            throw new \Exception('Testing my application!!');
        }
        catch(\Throwable $e){
            echo $e->getMessage();
        }


        $validation = Validator::make($request->all(),[
            'fullname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()]
        ]);

        if($validation->fails()){
            $this->setError($this->setResponseCode('not_acceptable'),array('errors' => $validation->messages()));
        }else{
            $userArr = array(
                'tgp_userid' => $request->tgp_userid ?? 0,
                'fullname' => $request->fullname ?? '',
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'last_logged_in' => date('Y-m-d H:i:s')
            );

            $user = User::create($userArr);
            event(new Registered($user));
            $this->setResponseData(array(
                'data' => array('user' => $user,)
            ));
        }

        return $this->sendAPIResponse();


    }

    /*public function test(Request $request){
        $arr = array("message" => $request->test);

//        Redis::set('client_id',13124,'EX',10);

//        Redis::del('client_id');
//        echo Redis::get('client_id');

        return response()->json($arr, 200);
    }*/

    public function getExistingUserData(Request $request){

        $user = User::where('tgp_userid',$request->userid)->first();
        if($user){
            $this->setResponseData(array( 'data' => array('success' => true, 'user'=>$user) ));
            return $this->sendAPIResponse();

        } else{
            $this->setResponseData(array( 'data' => array('success' => false) ));
            return $this->sendAPIResponse();
        }

    }

    public function storeUserData(Request $request){

        try{
            DB::beginTransaction();
            $userExists= User::where('email',$request->email)->first();

            if($userExists){
                $user=$userExists;
                $user->tgp_userid=$request->userid ?? 0;
                $user->username=$request->username ;
                $user->fullname=$request->fullname ;
                $user->dob=$request->dob ;
                $user->strava_id=$request->strava_id ?? 0;
                $user->strava_error=$request->strava_error;
                $user->gender=$request->gender;
                $user->ip=$request->ip ;
                $user->desktop_last_login_time=$request->desktop_last_login_time == '0000-00-00 00:00:00'? Null:$request->desktop_last_login_time;
                $user->app_last_login_time=$request->app_last_login_time == '0000-00-00 00:00:00'? Null:$request->app_last_login_time;
                $user->__login_token=$request->__login_token;
                $user->imported=$request->imported;
                $user->banned=$request->banned ;
                $user->email_verified=$request->email_verified;
                $user->email_verified_at=$request->email_verified_at ;
                $user->unread_counter=$request->unread_counter;
                $user->last_logged_in=$request->last_logged_in ;
                $user->fb_id=$request->fb_id??0;
                $user->google_id=$request->google_id??0 ;
                $user->apple_id=$request->apple_id??0 ;
                $user->save();
                $stravaDetailExist = StravaAccounts::where('userid',$user->id)->first();
                if($stravaDetailExist){
                    $stravaDetailExist->strava_access_token=$request->strava_access_token??'';
                    $stravaDetailExist->strava_refresh_token=$request->strava_refresh_token??'';
                    $stravaDetailExist->strava_token_expiry=$request->strava_token_expiry??'';
                    $stravaDetailExist->strava_error=$request->strava_error??0;
                    $stravaDetailExist->strava_id=$request->strava_id??0;
                    $stravaDetailExist->save();
                } else{
                    $stravaArr= [
                        'strava_access_token'=>$request->strava_access_token??'',
                        'strava_refresh_token'=>$request->strava_refresh_token??'',
                        'strava_token_expiry'=>$request->strava_token_expiry??'',
                        'strava_error'=>$request->strava_error??0,
                        'strava_id'=>$request->strava_id??0,
                        'userid'=>$user->id
                    ];
                    $staravDetail = StravaAccounts::create($stravaArr);
                }


             $userProfileExist= UserMedia::where('user_id',$user->id)->where('image_type','profile_image')->first();
             if($userProfileExist){
                $userProfileExist->path=$request->profile_pic??'';
                $userProfileExist->save();
             }else{
                $profile_imageArr=[
                    'user_id'=>$user->id,
                    'module'=>'profile',
                    'image_type'=>'profile_image',
                    'path'=>$request->profile_pic??'',
                ];
                $profileImgDetail = UserMedia::create($profile_imageArr);
             }

             $userCoverExist= UserMedia::where('user_id',$user->id)->where('image_type','cover_image')->first();
             if($userCoverExist){
                $userCoverExist->path=$request->cover_pic??'';
                $userCoverExist->save();
             }else{
                $cover_imageArr=[
                    'user_id'=>$user->id,
                    'module'=>'profile',
                    'image_type'=>'cover_image',
                    'path'=>$request->cover_pic??'',
                ];
                $coverImgDetail = UserMedia::create($cover_imageArr);
             }

            } else{
                $userArr = array(
                    'tgp_userid' => $request->userid ?? 0,
                    'fullname' => $request->fullname ?? '',
                    'username' => $request->username,
                    'email' => $request->email,
                    'dob'=> $request->dob,
                    'email' => $request->email,
                    'strava_id' => $request->strava_id??0,
                    'strava_error' => $request->strava_error,
                    'gender'=> $request->gender,
                    'ip' => $request->ip ,
                    'desktop_last_login_time' => $request->desktop_last_login_time == '0000-00-00 00:00:00'? Null:$request->desktop_last_login_time,
                    'app_last_login_time' => $request->app_last_login_time == '0000-00-00 00:00:00'?Null:$request->app_last_login_time ,
                    '__login_token'=> $request->__login_token,
                    'imported'=> $request->imported,
                    'banned' => $request->banned ,
                    'email_verified' => $request->email_verified,
                    'email_verified_at' => $request->email_verified_at,
                    'unread_counter'=> $request->unread_counter,
                    'last_logged_in' => $request->last_logged_in,
                    'fb_id' => $request->fb_id??0,
                    'google_id'=> $request->google_id??0,
                    'apple_id'=> $request->apple_id??0,
                    'password' => "",
                );

                $user = User::create($userArr);

                $stravaArr= [
                    'strava_access_token'=>$request->strava_access_token??'',
                    'strava_refresh_token'=>$request->strava_refresh_token??'',
                    'strava_token_expiry'=>$request->strava_token_expiry??'',
                    'strava_error'=>$request->strava_error??0,
                    'strava_id'=>$request->strava_id??0,
                    'userid'=>$user->id
                ];

                $staravDetail = StravaAccounts::create($stravaArr);

                $profile_imageArr=[
                    'user_id'=>$user->id,
                    'module'=>'profile',
                    'image_type'=>'profile_image',
                    'path'=>$request->profile_pic??'',
                ];
                $profileImgDetail = UserMedia::create($profile_imageArr);

                $cover_imageArr=[
                    'user_id'=>$user->id,
                    'module'=>'profile',
                    'image_type'=>'cover_image',
                    'path'=>$request->cover_pic??'',
                ];
                $coverImgDetail = UserMedia::create($cover_imageArr);

//                 event(new Registered($user));
            }


            DB::commit();
            $this->setResponseData(array( 'data' => array('success' => true, 'user'=>$user) ));
            return $this->sendAPIResponse();
        }catch(Exception|Error $exception) {
            DB::rollBack();
            $this->setResponseData(array( 'data' => array('success' => false) ));
            return $this->sendAPIResponse();

        }
    }

    public function getUserPaymentHistory(Request $request) {
        $allUser = User::all();
        $user = User::where('tgp_userid',$request->userid)->first();
        $events = '';
        if( $user != null ) {
            $events = EventUser::where('user_id', $user->id)
                // ->where('event_id', $request->eventid)
                ->where('is_paid_user', 1)
                ->get()->toArray();
            $paymentData = [];

            foreach( $events as $event ) {
                if( $user != null ) {
                    $paymentData[] = Payment::where('user_id', $user->id)
                    ->where('event_id', $event['event_id'])
                    ->get()->toArray();
                }
            }
        }
        $response = array(
            'userData' => $user,
            'event' => $events,
            'payment' => $paymentData,
            'allUser' => $allUser
        );
        $this->setResponseData(array( 'data' => array('success' => false, 'data' => $response), ));
        return $this->sendAPIResponse();
    }
}
