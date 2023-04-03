<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Users\StravaAccounts;
use App\Models\Events\Events;
use App\Models\Events\EventsMeta;
use App\Models\Events\EventsDate;
use App\Models\Events\EventImage;
use App\Models\Events\SocialSeo;
use App\Models\Events\Reward;
use App\Models\Events\MultiQuantityDiscount;
use App\Models\Events\RegistrationSetup;
use App\Models\Events\Coupon;
use App\Models\Events\LandingPage;
use App\Models\Events\Team;
use App\Models\Events\TeamUser;
use App\Models\Events\Payment;
use App\Models\Events\UserReward;
use App\Models\Events\EventUser;
use App\Models\Events\EventSuccessPage;
use App\Models\Events\EventsFaq;

use App\Helpers\CountryHelper;
use Carbon\Carbon;
use App\Repositories\Interfaces\EventRepositoryInterface;

use Log;
use DB;

class EventRepository implements EventRepositoryInterface
{

    public function getEventList(){
$data = Events::with('images','dates')->get();
return $data;
    }
    public function createEventEssential($request)
    {
        $event =  Events::create([
              'name' => $request->event_name,
              'hashtag' => $request->event_hashtag,
              'domain' => $request->domain,
              'slug' => $request->slug,
              'description' => $request->description,
              'timezone' => $request->timezone,
              'email' => $request->email,
              'email_active' => $request->email_forward ?? 0,
              'accessibility' => $request->event_type,
              'visibility' => $request->event_type == 'public' ? $request->visibility : 0,

              'created_at' => date('Y-m-d H:i:s')
        ]);
        return $event;
    }

    public function  updateEventEssential($request, $eventId){
        $event = Events::find($eventId);
        if ($event) {
             $event->name = $request->event_name;
             $event->hashtag = $request->event_hashtag;
             $event->domain = $request->domain;
             $event->slug = $request->slug;
             $event->description = $request->description;
             $event->timezone = $request->timezone;
             $event->email = $request->email;
             $event->email_active = $request->email_forward ?? 0;
             $event->accessibility = $request->event_type;
             $event->visibility = $request->event_type == 'public' ? $request->visibility : 0;

             $event->save();
            return $event;
        }
    }

    public function getEventMeta($eventId, $metaKey)
    {
        $eventMeta = EventsMeta::Where('event_id',$eventId)->Where('meta_key',$metaKey)->first();
        if($eventMeta && ($metaKey == 'accepted_domains' || $metaKey == 'accepted_emails')){
             $eventMeta=implode(', ' , (array)json_decode($eventMeta->meta_value));
        }
        return $eventMeta;

    }

    public function addEventMeta($eventId, $metaKey, $metaValue)
    {
         $event_meta = EventsMeta::create([
                 'event_id' => $eventId,
                 'meta_key' => $metaKey,
                 'meta_value' => $metaValue
         ]);
         return $event_meta;

    }

    public function deleteEventMeta($eventMetaId)
    {
       EventsMeta::Where('id',$eventMetaId)->delete();
    }

    public function updateEventMeta($eventId, $metaKey, $metaValue)
    {
        $eventMeta= EventsMeta::Where('event_id',$eventId)->Where('meta_key',$metaKey)->first();

        if ($eventMeta) {
            $eventMeta->meta_value=$metaValue;
               $eventMeta->save();
            }
    }

    public function getEventDates($eventId){
        $eventDate= EventsDate::Where('event_id',$eventId)->first();
        return $eventDate;
    }

    public function createEventDate($request,$eventId){
        $eventDate =  EventsDate::create([
            'event_id' =>$eventId,
            'registration_start_date' => $request->reg_start_date,
            'registration_end_date' => $request->reg_end_date,
            'free_registration_end_date' => $request->free_reg_end_date,
            'update_info_end_date' => $request->upd_info_end_date,
            'leaderboard_start_date' => $request->leaderboard_start_date,
            'leaderboard_end_date' => $request->leaderboard_end_date,
            'results_date' => $request->results_date,
            'upgrade_start_date' => isset($request->upgrade_start_date)?$request->upgrade_start_date:null,
            'upgrade_end_date' => isset($request->upgrade_end_date)?$request->upgrade_end_date:null,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        return $eventDate;
    }

    public function updateEventDate($request,$eventDateId){
        $eventDate = EventsDate::find($eventDateId);
        if ($eventDate) {
            $eventDate->registration_start_date = $request->reg_start_date;
            $eventDate->registration_end_date = $request->reg_end_date;
            $eventDate->free_registration_end_date = $request->free_reg_end_date;
            $eventDate->update_info_end_date = $request->upd_info_end_date;
            $eventDate->leaderboard_start_date = $request->leaderboard_start_date;
            $eventDate->leaderboard_end_date = $request->leaderboard_end_date;
            $eventDate->results_date = $request->results_date;
            $eventDate->upgrade_start_date = isset($request->upgrade_start_date)?$request->upgrade_start_date:null;
            $eventDate->upgrade_end_date = isset($request->upgrade_end_date)?$request->upgrade_end_date:null;
            $eventDate->save();
            return $eventDate;
        }
    }

    public function getEventImages($eventId){

        $eventImage= EventImage::Where('event_id',$eventId)->first();
        return $eventImage;
    }

    public function createEventImages($request,$eventId){
        $eventImage =  EventImage::create([
            'event_id' =>$eventId,
            'cover' => $request['cover'] ?? null,
            'icon' =>$request['icon'] ?? null,
            'notification' => $request['notification'] ?? null,
            'rewards' => $request['rewards'] ?? null,
            'event_name' => $request['event_name'] ?? null,
            'slider_background' =>$request['slider_background'] ?? null,
            'slider_foreground' =>$request['slider_foreground'] ?? null,
            'profile_icon' => $request['profile_icon'] ?? null,
            'ebib' => $request['ebib'] ?? null,
            'certificate' => $request['certificate'] ?? null,
        ]);
        return $eventImage;

    }

    public function updateEventImages($request,$eventId){
        $eventImage= EventImage::Where('event_id',$eventId)->first();
        if ($eventImage) {
            $eventImage->event_id = $eventId;
            $eventImage->cover =  $request['cover'] ?? $eventImage->cover ;
            $eventImage->icon = $request['icon'] ?? $eventImage->icon;
            $eventImage->notification = $request['notification'] ?? $eventImage->notification;
            $eventImage->rewards = $request['rewards'] ?? $eventImage->rewards;
            $eventImage->event_name = $request['event_name'] ?? $eventImage->event_name;
            $eventImage->slider_background = $request['slider_background'] ??  $eventImage->slider_background;
            $eventImage->slider_foreground = $request['slider_foreground'] ?? $eventImage->slider_foreground;
            $eventImage->profile_icon = $request['profile_icon'] ?? $eventImage->profile_icon;
            $eventImage->ebib = $request['ebib'] ?? $eventImage->ebib;
            $eventImage->certificate = $request['certificate'] ?? $eventImage->certificate;
            $eventImage->save();
            return $eventImage;
        }

    }

    public function getEventSocialSeo($eventId){
        $eventSeo= SocialSeo::Where('event_id',$eventId)->first();
        return $eventSeo;
    }

    public function createEventSeo($request,$eventId){

        $eventSeo =  SocialSeo::create([
            'event_id' =>$eventId,
            'page_title' => $request['page_title'] ?? null,
            'share_image' =>$request['share_image'] ?? null,
            'share_title' => $request['share_title'] ?? null,
            'share_description' => $request['share_description'] ?? null,
            'fb_pixel_id' => $request['fb_pixel_id'] ?? null,

        ]);
        return $eventSeo;
    }

    public function updateEventSeo($request,$eventId){
        $eventSeo= SocialSeo::Where('event_id',$eventId)->first();
        if ($eventSeo) {
            $eventSeo->event_id = $eventId;
            $eventSeo->page_title =  $request['page_title'] ?? $eventSeo->page_title ;
            $eventSeo->share_image = $request['share_image'] ?? $eventSeo->share_image;
            $eventSeo->share_title = $request['share_title'] ?? $eventSeo->share_title;
            $eventSeo->share_description = $request['share_description'] ?? $eventSeo->share_description;
            $eventSeo->fb_pixel_id = $request['fb_pixel_id'] ?? $eventSeo->fb_pixel_id;
          $eventSeo->save();
            return $eventSeo;
        }
    }

    public function getEventRewards($eventId, $rewardId){
        $reward= Reward::Where('event_id',$eventId)->where('id',$rewardId)->first();

            return $reward;
    }

    public function createEventRewards($request,$eventId){
//     dd($request);
     $rewards =  Reward::create([
                'event_id' =>$eventId,
                'name' => $request['name'] ?? null,
                'sku' =>$request['sku'] ?? null,
                'description' => $request['description'] ?? null,
                'max_quantity' => $request['max_quantity'] ?? null,
                'size' => $request['size'] ?? null,
                'sizing_images' =>json_encode($request['sizing_images']) ?? null,
                'rewards_images' =>json_encode($request['reward_image']) ?? null,
                'is_core_item' => isset($request['is_core_item']) ?$request['is_core_item'] == 1? 1 :0 :0,

            ]);

            return $rewards;
    }

    public function createEventRewardPrice($request,$rewardId){
        $rewards= Reward::Where('id',$rewardId)->first();
        $rewards->restrict_to_country =  $request['restrict_to_country'] ?? $rewards->restrict_to_country;
        $rewards->countries_allowed = isset($request['countries_allowed']) ? json_encode($request['countries_allowed'] ):$rewards->countries_allowed;
        $rewards->price =  isset($request['price']) ? json_encode($request['price'] ):$rewards->price;
        $rewards->save();
        return $rewards;
    }

    public function getRewards($eventId){
        $rewards= Reward::Where('event_id',$eventId)->get();
        return $rewards;
    }

    public function getCoreRewards($eventId){
        $coreRewards= Reward::Where('event_id',$eventId)->where('is_core_item',1)->get();
        return $coreRewards->sortBy('sort_id');
    }

    public function getAddonRewards($eventId){
        $addonRewards= Reward::Where('event_id',$eventId)->where('is_core_item',0)->get();
        return $addonRewards->sortBy('sort_id');
    }

    public function toggleEventRewardIsDependent($rewardId){
        $reward= Reward::Where('id',$rewardId)->first();
        if($reward->is_dependent_sku == 0){
            $reward->is_dependent_sku = 1;
        } else{
            $reward->is_dependent_sku = 0;
        }
        $reward->save();
        return $reward;

    }

    public function updateRewardDependentSku($rewardId, $dependentSku){
        $reward= Reward::Where('id',$rewardId)->first();
        $reward->dependent_sku=	$dependentSku;
        $reward->save();
        return $reward;
    }

    public function toggleReward($rewardId){
        $reward= Reward::Where('id',$rewardId)->first();
        if($reward->is_hidden == 0){
            $reward->is_hidden = 1;
        } else{
            $reward->is_hidden = 0;
        }
        $reward->save();
        return $reward;
    }

    public function editEventRewards($request,$rewardId){
        $rewards= Reward::Where('id',$rewardId)->first();
        if ($rewards) {
            $rewards->name = $request['name'] ?? $rewards->name;
            $rewards->sku =  $request['sku'] ?? $rewards->sku ;
            $rewards->description = $request['description'] ?? $rewards->description;
            $rewards->max_quantity = $request['max_quantity'] ?? $rewards->max_quantity;
            $rewards->size = $request['size'] ?? $rewards->size;
            $rewards->sizing_images = json_encode($request['sizing_images'])?? $rewards->sizing_images;
            $rewards->rewards_images = json_encode($request['reward_image']) ?? $rewards->rewards_images;
            $rewards->is_core_item = isset($request['is_core_item']) && $request['is_core_item'] == 1? 1 : 0;
            $rewards->save();
            return $rewards;
        }

    }
    public function storeMultiQuantityDiscount($request,$eventId){
        $discount =  MultiQuantityDiscount::create([
          'event_id' =>$eventId,
          'condition' => $request->condition ?? null,
          'quantity' =>$request->quantity ?? null,
          'discount' => $request->discount ?? null,
        ]);
        return $discount;
    }

    public function editMultiQuantityDiscount($request,$eventId){
        $discount= MultiQuantityDiscount::Where('id',$request->discountId)->first();
        if ($discount) {
            $discount->condition  = $request->condition ?? $discount->condition;
            $discount->quantity = $request->quantity ?? $discount->quantity;
            $discount->discount = $request->discount ??  $discount->discount;
            $discount->save();
            return $discount;
        }

    }

    public function getMultiQuantityDiscount($eventId){
        $discount= MultiQuantityDiscount::Where('event_id',$eventId)->get();
        return $discount;
    }


    public function deleteMultiQuantityDiscount( $eventId, $discountId){
        $discount= MultiQuantityDiscount::Where('event_id',$eventId)->where('id', $discountId)->delete();
        return $discount;
    }


    public function sortRewards($request, $eventId){
        $arr = explode(',',$request['data']);
        foreach($arr as $sortOrder => $id){
           $reward= Reward::Where('event_id',$eventId)->Where('id',$id)->first();
           if($reward){
               $reward->sort_id = $sortOrder+1;
               $reward->save();
           }
        }
        return true;
    }
    public function removePriceRewards($request){
        $rewards= Reward::Where('id',$request->rewardId)->first();
        if ($rewards) {
            $rewards->price='';
            $rewards->restrict_to_country = $request->restrict_to_country;
            $rewards->countries_allowed='';
            $rewards->save();
            return $rewards;
        }
    }

    public function publishEvent($eventId) {
        $event= Events::Where('id',$eventId)->first();
        if($event->event_status == 0){
             $event->event_status = 1;
        } else{
             $event->event_status = 0;
        }
        $event->save();
        return $event;
    }

    public function hideEvent($eventId){
        $event= Events::Where('id',$eventId)->first();
        if($event->is_hidden == 0){
            $event->is_hidden = 1;
        } else{
            $event->is_hidden = 0;
        }
        $event->save();
        return $event;
    }

    public function getRegistrationSetup($eventId){
        $registrationSetup = RegistrationSetup::where('event_id',$eventId)->first();
        return $registrationSetup;
    }

    public function createRegistrationSetup($request, $eventId){
        $registrationSetup =  RegistrationSetup::create([
            'event_id' =>$eventId,
            'intro_message' => $request['intro_message'] ?? '',
            'enable_teams' =>$request['enable_teams'] ?? 0,
            'min_members' =>$request['min_members'] ?? null,
            'max_members' =>$request['max_members'] ?? null,
            'enable_referral' =>$request['enable_referral'] ?? 0,
            'enable_coupon' =>$request['enable_coupon'] ?? 0,
            'enable_delivery_address' =>$request['enable_delivery_address'] ?? 0,
            'reason_for_collecting_address' =>$request['reason'] ?? '',
            'enable_grouping' =>$request['enable_grouping'] ?? 0,
            'grouping_header' =>$request['grouping_header'] ?? '',
            'field_value' =>$request['field_value'] ?? '',
            'enable_random_allocation' =>$request['enable_random_allocation'] ?? 0,
            'geo_json' => $request['geo_json'] ?? '',
            'enable_map_view' => $request['enable_map_view'] ?? 0,
        ]);
        return $registrationSetup;
    }

    public function updateRegistrationSetup($request, $eventId){
        $registrationSetup= RegistrationSetup::Where('event_id',$eventId)->first();

        $registrationSetup->intro_message =  $request['intro_message'] ?? '';
        $registrationSetup->enable_teams = $request['enable_teams'] ??0;
        $registrationSetup->min_members =  $request['min_members'] ?? 0;
        $registrationSetup->max_members =$request['max_members'] ?? 0;
        $registrationSetup->enable_referral =$request['enable_referral'] ??  0;
        $registrationSetup->enable_coupon =$request['enable_coupon'] ??  0;
        $registrationSetup->enable_delivery_address =$request['enable_delivery_address'] ?? 0;
        $registrationSetup->reason_for_collecting_address =$request['reason'] ?? '';
        $registrationSetup->enable_grouping =$request['enable_grouping'] ?? 0;
        $registrationSetup->grouping_header =$request['grouping_header'] ??  '';
        $registrationSetup->field_value =$request['field_value'] ??  '';
        $registrationSetup->enable_random_allocation =$request['enable_random_allocation'] ??  0;
        $registrationSetup->geo_json = $request['geo_json'] ??  '';
        $registrationSetup->enable_map_view = $request['enable_map_view'] ??  0;
        $registrationSetup->save();
        return $registrationSetup;
    }
    public function getAllCoupons($eventId){
        $coupons = Coupon::where('event_id',$eventId)->get();
        return $coupons;
    }

    public function getCoupon($couponId){
        $coupon = Coupon::where('id',$couponId)->first();
        return $coupon;
    }

    public function storeCoupon($request){

        if($request['discountId'] ==0){
            $coupon =  Coupon::create([
                    'event_id' =>$request['challengeId'],
                    'name' => strtoupper($request['name']) ?? '',
                    'discount' =>$request['discount'] ?? 0,
                    'rewards' =>$request['rewards'] ?? '',
                    'max_use' =>$request['max_use'] ?? -1,
                    'expiry_date' =>$request['expiry_date'] ?? '',
                ]);
        } else{
            $coupon = Coupon::where('id',$request['discountId'])->first();
            $coupon->name= strtoupper($request['name']) ?? $coupon->name;
            $coupon->discount =$request['discount'] ?? $coupon->discount;
            $coupon->rewards =$request['rewards'] ?? $coupon->rewards;
            $coupon->max_use =$request['max_use'] ?? $coupon->max_use;
            $coupon->expiry_date =$request['expiry_date'] ?? $coupon->expiry_date;
            $coupon->save();
        }
        return $coupon;

    }

    public function deleteCoupon($eventId, $couponId){
        $coupon = Coupon::where('id',$couponId)->where('event_id', $eventId)->delete();
        return $coupon;
    }

    public function getLandingPage($eventId){
        $landingPage= LandingPage::where('event_id',$eventId)->first();
        return $landingPage;
    }

    public function storeLandingPage($eventId, $data){
     $landingPage = LandingPage::where('event_id',$eventId)->first();
     if(is_null($landingPage)){
        $landingPage =  LandingPage::create([
                             'event_id' =>$eventId,
                             'show_countdown' => $data['show_countdown'] ?? 0,
                             'show_sponsor' =>$data['show_sponsor'] ?? 0,
                             'sponsor_detail' =>$data['sponsor_detail'] ?? null,
                             'sponsor_detail_unlayer' =>$data['sponsor_detail_unlayer'] ?? null,
                             'event_detail' =>$data['event_detail'] ?? null,
                             'event_detail_unlayer' =>$data['event_detail_unlayer'] ?? null,
                             'show_rewards' =>$data['show_rewards'] ?? 0,
                             'Short_faq' =>$data['Short_faq'] ?? null,
                         ]);
     } else{

     $landingPage->show_countdown = $data['show_countdown'] ??  0;
     $landingPage->show_sponsor = $data['show_sponsor'] ?? 0;
     $landingPage->sponsor_detail = $data['sponsor_detail'] ??  $landingPage->sponsor_detail;
     $landingPage->sponsor_detail_unlayer = $data['sponsor_detail_unlayer'] ??  $landingPage->sponsor_detail_unlayer;
     $landingPage->event_detail = $data['event_detail'] ??  $landingPage->event_detail;
     $landingPage->event_detail_unlayer = $data['event_detail_unlayer'] ??  $landingPage->event_detail_unlayer;
     $landingPage->show_rewards = $data['show_rewards'] ??  0;
     $landingPage->Short_faq = $data['Short_faq'] ??  $landingPage->Short_faq;

     $landingPage->save();
     }

     return   $landingPage;

    }

    public function getEventDataThroughSlug($slug){
        return Events::where('slug','LIKE','%'.$slug.'%')->with('images','dates','landingPage','rewards','eventMeta', 'achievements')->where('event_status',1)->first();
    }

    public function getEventIdThroughSlug($slug){
        return Events::select('id')->where('slug',$slug)->first();
    }

    public function getAllTeams($eventId){
        return Team::where('event_id',$eventId)->with('teamUsers','teamUsers.user')->get();
    }

    public function validateTeam($data){
        $teamExist=  Team::where('event_id',$data['eventId'])->where('team_name',$data['team_name'])->first();
        if($teamExist){
            return (['success' =>false,'data'=>"Team name already taken, please enter another one!"]);
        } else{
            return (['success' =>true,'data'=>"Team name available"]);
        }
    }

    public function createNewTeam($data){
        $teamExist=  Team::where('event_id',$data['eventId'])->where('team_name',$data['team_name'])->first();
        if($teamExist){
            return (['success' =>false,'data'=>"Team name already taken, please enter another one!"]);
        } else{
            $team =  Team::create([
                'event_id' =>$data['eventId'],
                'team_name' => $data['team_name'],
            ]);

            // if($team  ){
            //     $user= User::select('id')->where('tgp_userid',$data['userId'])->first();
            //     $teamUser =  TeamUser::create([
            //         'user_id' =>$user->id,
            //         'team_id' => $team->id,
            //         'is_owner'=>1
            //     ]);

            // }

            return (['success' =>true,'team'=>$team]);
        }

    }

    public function validateCouponCode($data){
        $coupon = Coupon::where('event_id',$data['eventId'])->where('name',$data['couponCode'])->first();
        if($coupon){
            $couponExpiryDate= $coupon->expiry_date;
            $couponExpiryDate = Carbon::Parse($couponExpiryDate)->toDateTimeString();
            $now = Carbon::now()->toDateTimeString();
            if($couponExpiryDate >= $now){

                if($coupon->max_use != -1){
                    $couponUsed = Payment::where('event_id',$data['eventId'])->where('coupon_code',$data['couponCode'])->where('status',1)->count();
                    if($couponUsed >= $coupon->max_use){
                        return (['success'=>false,'error'=>'Coupon Limit Reached']);
                    }
                }
                $membership= explode(",",$data['membership']);
                $couponRewards = json_decode($coupon->rewards, true);
                $validRewards = [];
                foreach($membership as $memb){
                    if(in_array($memb, $couponRewards)){
                        array_push($validRewards, $memb);
                    }
                }
                if(count($validRewards) >0){
                    return (['success'=>true,'rewards'=>json_encode($validRewards),'coupon'=>$coupon]);
                } else{
                    return (['success'=>false,'error'=>'Coupon Not Applicable For Selected Items']);
                }
            } else{
                return (['success'=>false,'error'=>'Coupon Expired']);
            }
        } else{
            return (['success'=>false,'error'=>'Invalid Coupon']);
        }
    }

    public function validateReferralCode($data){
        $user= User::select('id')->where('username',$data['referralCode'])->first();
        if($user){
            $userExistInEvent = EventUser::where('event_id',$data['eventId'])->where('user_id',$user->id)->first();
            if($userExistInEvent){
                return (['success'=>true,'error'=>'Referral Code Applied']);
            } else{
                return (['success'=>false,'error'=>'Invalid Code']);
            }

        }
        return (['success'=>false,'error'=>'Invalid Code']);



    }

    public function calculatePrice($data){

        $responseData=[];
        $discount= MultiQuantityDiscount::Where('event_id',$data['eventId'])->get();
        $country=$data['country'];
        $membership=json_decode(stripslashes($data['membership']),true);
//         $membership= explode(",",$data['membership']);

        $couponCode=isset($data['couponCode'])?$data['couponCode'] : '';

        $countryHelper = new CountryHelper();
        $countryCurrency= $countryHelper->country_currency();

        foreach($countryCurrency as $country_currency){
            if($country_currency['country'] == $country){
                $currency= $country_currency['currency_code'];
            }
        }
        $coupon=null;
        if( $couponCode !=''){
            $coupon = Coupon::where('event_id',$data['eventId'])->where('name',$couponCode)->first();
            if($coupon){
                $couponRewards = json_decode($coupon->rewards, true);

            }
        }
        $totalQuantity=0;
        $CouponDiscApplyAmount=0;
        $totalPrice=0;
        $userCurrency='';
        $discountAmount=0;
        $amountAfterDiscount=0;
        $checkoutCurrency='';
        $discountpercentage=0;
        $validRewards=[];
        if(count($membership) > 0){

            foreach($membership as $rewardId){
                $totalQuantity += $rewardId[1];
                $reward= Reward::Where('event_id',$data['eventId'])->where('id',$rewardId[0])->first();

                $rewardPrice= $reward->price != '' ?json_decode($reward->price) :null;
                $userPrice=0;
                if($rewardPrice){
                    foreach($rewardPrice as $price){
                        if($price->country == 'Global'){
                            $globalPrice=$price->price;
                            $globalCurrency=$price->currency ;
                        }
                        if($price->currency == $currency){
                            $userPrice=$price->price;
                            $userCurrency=$price->currency ;
                        }
                    }
                    if($userPrice){
                        if($coupon){
                            if(in_array($rewardId[0], $couponRewards)){
                                $CouponDiscApplyAmount += ($userPrice*$rewardId[1]);
                                array_push($validRewards, $rewardId[0]);
                                $discountAmount += ($coupon->discount/100)*($userPrice*$rewardId[1]);
                            }
                        }
                        $responseData['membership'][$rewardId[0]]['price']=($userPrice*$rewardId[1]);
                        $totalPrice +=($userPrice*$rewardId[1]);
                        $checkoutCurrency=  $userCurrency;

                    } else{
                        if($coupon){
                            if(in_array($rewardId[0], $couponRewards)){
                            array_push($validRewards, $rewardId[0]);
                                $CouponDiscApplyAmount +=($globalPrice*$rewardId[1]);
                                 $discountAmount += ($coupon->discount/100)*($globalPrice*$rewardId[1]);
                            }
                        }
                        $responseData['membership'][$rewardId[0]]['price']=($globalPrice*$rewardId[1]);
                        $totalPrice +=($globalPrice*$rewardId[1]);
                        $checkoutCurrency=  $globalCurrency;
                    }


                }
            }

            if( $coupon){
                //                 $discountAmount = ($coupon->discount/100)*$totalPrice;
                                $discountpercentage=$coupon->discount;
                            } else if(count($discount)){
                                $membershipCount=  $totalQuantity;

                                $discountpercentage=0;
                                foreach($discount as $disc){

                                   if($disc->condition == 'Equal to'){
                                       if($disc->quantity == $membershipCount){
                                           $discountpercentage=$disc->discount;
                                       }
                                   }else if($disc->condition == 'More than'){

                                       if($membershipCount> $disc->quantity ){
                                           $discountpercentage=$disc->discount;
                                       }
                                   }
                                }
                                if($discountpercentage ){
                                $discountAmount = ($discountpercentage/100)*$totalPrice;
                                }

                            }
                        }


                        if($discountAmount >0){
                            $discountAmount = round($discountAmount,2);
                            $amountAfterDiscount = $totalPrice-$discountAmount;


                        } else{
                        $amountAfterDiscount =$totalPrice;
                        }
        $responseData['AmountAfterDiscountDisplay'] = formatPrice($checkoutCurrency ,$amountAfterDiscount);
        $responseData['TotalAmountDisplay'] = formatPrice($checkoutCurrency ,$totalPrice);
        $responseData['AmountAfterDiscount'] = $amountAfterDiscount;
        $responseData['TotalAmount'] = $totalPrice;
        $responseData['discountpercentage'] = $discountpercentage;
        $responseData['discountAmount'] = $discountAmount;
        $responseData['checkoutCurrency'] = $checkoutCurrency;
        $responseData['validRewards'] = $validRewards;

        return  $responseData;
    }

    public function getActiveRewards($eventId){
        $rewards= Reward::Where('event_id',$eventId)->where('is_hidden',0)->get();
        return $rewards;
    }

    public function getActiveCoreRewards($eventId){
        $coreRewards= Reward::Where('event_id',$eventId)->where('is_hidden',0)->where('is_core_item',1)->get();
        return $coreRewards->sortBy('sort_id');
    }

    public function getActiveAddonRewards($eventId){
        $addonRewards= Reward::Where('event_id',$eventId)->where('is_hidden',0)->where('is_core_item',0)->get();
        return $addonRewards->sortBy('sort_id');
    }

    public function getCheckoutRewards($data){

        $addonRewards= Reward::whereIn('id', $data['id'])->where('event_id',$data['event_id'])->get();
        return $addonRewards;
    }

    public function createEventSuccessPage($request,$eventId){

        $success_page = EventSuccessPage::create([
            'event_id' => $eventId,
            'no_purchase_made' => $request['no_purchase_made'] ?? '',
            'partial_purchase_made' => $request['partial_purchase_made'] ?? '',
            'all_purchase_made' => $request['all_purchase_made'] ?? '',
            'active_custom_message' => $request['active_custom_message'] ?? 0,
            'invite_friend' => $request['invite_friend'] ?? '',
            'email_subject' => $request['email_subject'] ?? '',
            'email_body' => $request['email_body'] ?? '',
            'custom_message' => (isset($request['active_custom_message']) && $request['active_custom_message']==1)? $request['custom_message']:''
            ]);
        return $success_page;
    }

    public function getEventSuccessSetup($eventId){
        $success_page = EventSuccessPage::Where('event_id',$eventId)->first();
        return $success_page;
    }

    public function updateEventSuccessSetup($request,$eventId){
        $success_page = EventSuccessPage::Where('event_id',$eventId)->first();
        if ($success_page) {
            $success_page->event_id = $eventId;
            $success_page->no_purchase_made =  $request['no_purchase_made'] ?? $success_page->no_purchase_made ;
            $success_page->partial_purchase_made = $request['partial_purchase_made'] ?? $success_page->partial_purchase_made;
            $success_page->all_purchase_made =  $request['all_purchase_made'] ?? $success_page->all_purchase_made;
            $success_page->active_custom_message = $request['active_custom_message'] ??  0;
            $success_page->invite_friend =  $request['invite_friend'] ?? $success_page->invite_friend;
            $success_page->email_subject =  $request['email_subject'] ?? $success_page->email_subject;
            $success_page->email_body =  $request['email_body'] ?? $success_page->email_body;
            $success_page->custom_message = (isset($request['active_custom_message']) && $request['active_custom_message']==1)? $request['custom_message']: '';

            $success_page->save();

            return $success_page;
        }
    }


    public function processFreeRegistration($data){
        //     dd($data);
        //   dd(json_decode($data['address']));
        // $data['address']=json_decode($data['address']);
                $user= User::where('tgp_userid',$data['userId'])->first();
                $StravaAccounts= StravaAccounts::select('id')->where('userid',$user->id)->first();

                ## Bib
                $exists = true;
                while($exists){
                    $bib = rand(0,99999);
                    $bib = str_pad($bib,5,'0',STR_PAD_LEFT);

                    $cuserBibE = EventUser::where('event_id',$data['eventId'])->where('bib', $bib)->get();
                    if($cuserBibE){
                        $exists = false;
                    }
                }

                $userbib = $bib;


                ## Token
                $exists = true;
                while($exists){
                    $token = bin2hex(openssl_random_pseudo_bytes(8));
                    $cuserTokenE = EventUser::where('token', $token)->get();
                    if($cuserTokenE){
                        $exists = false;
                    }
                }

                $cutoken = $token;

                $eventUser =  EventUser::create([
                    'event_id' =>$data['eventId'],
                    'user_id' => $user->id,
                    'is_paid_user'=>0,
                    'referral_code'=>$data['referral_code']??null,
                    'address_id'=>0,
//                     'postal_code'=>$data['address']['postal_code']??'',
                    'country'=>$data['country']??'',
//                     'city'=>$data['address']['city']??'',
//                     'state'=>$data['address']['state']??'',
//                     'subdistrict'=>$data['address']['subdistrict']??'',
//                     'address'=>$data['address']['address']??'',
//                     'blk'=>$data['address']['blk']??'',
                    'strava_account_id'=>$StravaAccounts->id??0,
                    'gender'=>$user->gender,
                    'dob'=> $user->dob,
                    'bib'=>$userbib,
                    'token'=>$cutoken,
                    'group'=>$data['group']??'',
                ]);

                if(isset($data['team']) && $data['team'] > 0){
                    $teamAdmin = TeamUser::where('team_id',$data['team'])->where('is_owner',1)->first();
                    if(  $teamAdmin ){
                        $teamOwner=0;
                    }else{
                        $teamOwner=1;
                    }
                    $teamUser =  TeamUser::create([
                        'user_id' =>$user->id,
                        'team_id' => $data['team'],
                        'is_owner'=> $teamOwner
                    ]);
                }

                $payment =  Payment::create([
                    'event_id' =>$data['eventId'],
                    'user_id' => $user->id,
                    'payment_type'=>'registration',
                    'payment_method'=>'Free',
                    'payment_intent'=>'Free_'.$eventUser->id,
                    'total_amount'=>'0.00',
                    'discount'=>'0.00',
                    'total_paid'=>'0.00',
                    'currency'=>$data['currency'],
                    'coupon_code'=>'',
                    'status'=>'successful',
                ]);

                return (['event_user'=>$eventUser , 'payment'=>$payment]);
            }

            public function processPaidRegistration($data){
                $user= User::where('tgp_userid',$data['userId'])->first();
                $StravaAccounts= StravaAccounts::select('id')->where('userid',$user->id)->first();

                ## Bib
                $exists = true;
                while($exists){
                    $bib = rand(0,99999);
                    $bib = str_pad($bib,5,'0',STR_PAD_LEFT);

                    $cuserBibE = EventUser::where('event_id',$data['eventId'])->where('bib', $bib)->get();
                    if($cuserBibE){
                        $exists = false;
                    }
                }

                $userbib = $bib;


                ## Token
                $exists = true;
                while($exists){
                    $token = bin2hex(openssl_random_pseudo_bytes(8));
                    $cuserTokenE = EventUser::where('token', $token)->get();
                    if($cuserTokenE){
                        $exists = false;
                    }
                }

                $cutoken = $token;


                $eventUser =  EventUser::create([
                    'event_id' =>$data['eventId'],
                    'user_id' => $user->id,
                    'is_paid_user'=>1,
                    'referral_code'=>$data['referral_code']??'',
                    'address_id'=>$data['address_id']??0,
                    'postal_code'=>$data['address']['postal_code']??null,
                    'country'=>$data['country']??null,
                    'city'=>$data['address']['city']??null,
                    'state'=>$data['address']['state']??null,
                    'subdistrict'=>$data['address']['subdistrict']??null,
                    'address'=>$data['address']['address']??null,
                    'blk'=>$data['address']['blk']??null,
                    'strava_account_id'=>$StravaAccounts->id??0,
                    'gender'=>$user->gender,
                    'dob'=> $user->dob,
                    'bib'=>$userbib,
                    'token'=>$cutoken,
                    'group'=>$data['group']??'',
                ]);

                if(isset($data['team']) && $data['team'] > 0){
                    $teamAdmin = TeamUser::where('team_id',$data['team'])->where('is_owner',1)->first();
                    if(  $teamAdmin ){
                        $teamOwner=0;
                    }else{
                        $teamOwner=1;
                    }
                    $teamUser =  TeamUser::create([
                        'user_id' =>$user->id,
                        'team_id' => $data['team'],
                        'is_owner'=> $teamOwner
                    ]);
                }

                $payment =  Payment::create([
                    'event_id' =>$data['eventId'],
                    'user_id' => $user->id,
                    'payment_type'=>'registration',
                    'payment_method'=>'Stripe',
                    'payment_intent'=>'Free_'.$eventUser->id,
                    'total_amount'=>$data['totalPrice'],
                    'discount'=>$data['discountAmount'],
                    'total_paid'=>$data['priceToPay'],
                    'currency'=>$data['currency'],
                    'coupon_code'=>$data['coupon_code']??'',
                    'status'=>'processing',
                ]);

                foreach($data['memb'] as $membership){
                    $reward =  UserReward::create([
                        'event_id' =>$data['eventId'],
                        'user_id' => $user->id,
                        'reward_id'=>$membership['reward'],
                        'size'=>$membership['size']??null,
                        'payment_id'=>$payment->id,
                        'quantity'=>$membership['quantity'],
                        'amount'=>(str_replace(',','',$membership['rewardPrice']))*$membership['quantity'],
                        'discount'=>$membership['discountedPrice']??0,
                        'currency'=>$data['currency']
                    ]);

                }

                return (['event_user'=>$eventUser , 'payment'=>$payment, 'user' => $user]);

            }

            public function getEventUserData($data){

                $eventUserId = $data['eventUser'];
                $paymentId = $eventId=$data['payment'];
                $eventUser = EventUser::where('id',$eventUserId)->with('user','team_user','team_user.team')->first();
                $payment = Payment::where('id',$paymentId)->with('user_reward','user_reward.rewards')->first();


                return (['event_user'=>$eventUser , 'payment'=>$payment]);
            }

            public function getEventSuccessPage($data){
                $eventId=$data['eventId'];
                $success_page = EventSuccessPage::Where('event_id',$eventId)->first();
                return  $success_page;

            }

            public function updatePayment($data){

                $payment = Payment::Where('id',$data['paymentId'])->first();

                if ($payment) {

                    $event = Events::where('id',$payment->event_id)->first();
                    $payment->transaction_id = $event->slug.''.$payment->id;

                    $event_user = EventUser::where('event_id',$payment->event_id)->where('user_id', $payment->user_id)->first();

                    $payment->payment_intent =$data['payment_intent'];
                    $payment->status  =  $data['status'];
                    $payment->full_response = $data['fullresponse'];

                    $payment->payment_id = $data['payment_intent'];
                    $payment->address_id = $event_user->address_id;

                    $payment->save();

                    return $payment;
                }
            }

            public function getEventData($slug){
                return Events::where('slug','LIKE','%'.$slug.'%')->first();

            }

            public function checkEventUser($data){
                $user= User::where('tgp_userid',$data['userId'])->first();
                return EventUser::where('event_id',$data['eventId'])->where('user_id', $user->id)->with('user', 'team_user','team_user.team')->first();
           }

            public function getTermConditions($data){
                return EventsFaq::where('event_id', $data['eventId'])->first();
            }

            public function getSocialData($data)
            {
                return SocialSeo::where('event_id', $data['eventId'])->first();
            }

            public function updateUserTeam($data){
                $user= User::where('tgp_userid',$data['userId'])->first();

                if($data['newTeam'] ==1){
                    $teamExist=  Team::where('event_id',$data['eventId'])->where('team_name','LIKE','%'.$data['team_name'].'%')->first();
                    if($teamExist){
                        return (['success' =>false,'data'=>"Team name already taken, please enter another one!"]);
                    } else{
                        $team =  Team::create([
                            'event_id' =>$data['eventId'],
                            'team_name' => $data['team_name'],
                        ]);

                        $userTeams=TeamUser::where('user_id',$user->id)->with('team')->get();
                        foreach($userTeams as $teams){
                            if($teams->team->event_id == $data['eventId']){
                                TeamUser::where('team_id',$teams->id)->where('user_id',$user->id)->delete();
                                break;
                            }
                        }


                        $teamUser =  TeamUser::create([
                            'user_id' =>$user->id,
                            'team_id' => $team->id,
                            'is_owner'=> 1
                        ]);
                    }

                } else{
                    $userTeams=TeamUser::where('user_id',$user->id)->with('team')->get();
                        foreach($userTeams as $teams){
                            if($teams->team->event_id == $data['eventId']){
                                TeamUser::where('team_id',$teams->id)->delete();
                                break;
                            }
                        }


                        $teamUser =  TeamUser::create([
                            'user_id' =>$user->id,
                            'team_id' => $data['team_id'],
                            'is_owner'=> 0
                        ]);
                }

                return (['success' =>true,'data'=>"Team updated successfully"]);

            }

            public function getEventUsersList($eventId){

                $data= EventUser::where('event_users.event_id',$eventId)
              /*   ->join('payments', function ($join) {
                    $join->on('event_users.event_id', '=', 'payments.event_id')
                    ->on('payments.user_id', '=', 'event_users.user_id')
                    //->where('payments.payment_type', '=', 'registration')
                    ->groupBy('user_id','event_id')
                    ->orderBy("payments.id","DESC")
                    ->limit(1);

                }) */
                ->with('user','team_user','team_user.team','payment')
                ->leftJoin('user_rewards', function ($join) {
                    $join->on('event_users.event_id', '=', 'user_rewards.event_id')
                         ->on('user_rewards.user_id', '=', 'event_users.user_id')
                         ;
                })

               // ->select('event_users.*', 'payments.status','payments.coupon_code','payments.total_paid','payments.currency',DB::raw('count(user_rewards.id) as total_sku'))->orderBy('event_users.id','DESC')->orderBy('payments.id','DESC')->groupBy('event_users.user_id')->get();
                ->select('event_users.*',DB::raw('count(user_rewards.id) as total_sku'))->orderBy('event_users.id','DESC')->groupBy('event_users.user_id')->get();
               return $data;
            }

            public function removeEventUser($eventId, $userId){

                $teams = TeamUser::where('user_id',$userId)->with('team')->get();
                foreach($teams as $team){
                    if($team->team->event_id == $eventId){
                        $teams = TeamUser::where('user_id',$userId)->where('id',$team->id)->delete();
                    }
                }
                UserReward::where('user_id',$userId)->where('event_id',$eventId)->delete();
                Payment::where('user_id',$userId)->where('event_id',$eventId)->delete();
                EventUser::where('user_id',$userId)->where('event_id',$eventId)->delete();
                return true;

            }

            public function eventUsersCount($eventId){
                $data=[];
                $data['userCount']=  EventUser::where('event_id',$eventId)->select('user_id')->distinct()->count();
                $data['userProfile']= EventUser::inRandomOrder()->where('event_id',$eventId)->join('user_media', function ($join) {
                    $join->on('event_users.user_id', '=', 'user_media.user_id')
                         ->where('user_media.image_type', '=', 'profile_image');
                })->limit(5)->get();


                return $data;
            }

            public function  publishEventManually($request, $eventId){
                if($eventId!='' && $eventId!=8){
                    $response = Events::where('id',$eventId)->update(['event_status'=>1]);
                    return $response;

                }

            }

            public function eventRegistrationPaymentId($eventId, $userId){
                $user= User::where('tgp_userid', $userId)->first();
                $payment =Payment::where('user_id', $user->id)->where('event_id',$eventId)->where('payment_type','registration')->select('id')->first();
                return $payment;
            }

            public function eventUpgradePaymentId($eventId, $userId){
                $user= User::where('tgp_userid', $userId)->first();
                $payment =Payment::where('user_id', $user->id)->where('event_id',$eventId)->where('payment_type','upgrade')->select('id')->first();
                return $payment;
            }

            public function processUpgradeEvent($data){
                $user = User::where('tgp_userid',$data['userId'])->first();


                // get event user details
                $eventUser = EventUser::where('event_id',$data['eventId'])->where('user_id', $user->id)->first();
                if($eventUser->address_id == 0){
                    $eventUser->address_id=$data['address_id']??0;
                    $eventUser->postal_code=$data['address']['postal_code']??null;
                    $eventUser->country=$data['country']??null;
                    $eventUser->city=$data['address']['city']??null;
                    $eventUser->state=$data['address']['state']??null;
                    $eventUser->subdistrict=$data['address']['subdistrict']??null;
                    $eventUser->address=$data['address']['address']??null;
                    $eventUser->blk=$data['address']['blk']??null;
                    $eventUser->save();
                }
                $payment =  Payment::create([
                    'event_id' =>$data['eventId'],
                    'user_id' => $user->id,
                    'payment_type'=>'upgrade',
                    'payment_method'=>'Stripe',
                    'payment_intent'=>'Free_'.$eventUser->id,
                    'total_amount'=>$data['totalPrice'],
                    'discount'=>$data['discountAmount'],
                    'total_paid'=>$data['priceToPay'],
                    'currency'=>$data['currency'],
                    'coupon_code'=>$data['coupon_code']??'',
                    'status'=>'processing',
                ]);

                foreach($data['memb'] as $membership){
                    if(isset($membership['reward']) && $membership['reward'] > 0){
                        $reward =  UserReward::create([
                            'event_id' =>$data['eventId'],
                            'user_id' => $user->id,
                            'reward_id'=>$membership['reward'],
                            'size'=>$membership['size']??null,
                            'payment_id'=>$payment->id,
                            'quantity'=>$membership['quantity'],
                            'amount'=>$membership['rewardPrice']*$membership['quantity'],
                            'discount'=>$membership['discountedPrice']??0,
                            'currency'=>$data['currency']
                        ]);
                    }

                }

                return (['event_user'=>$eventUser , 'payment'=>$payment]);

            }

            public function updateUpgradeEventPayment($data){

                $payment = Payment::Where('id',$data['paymentId'])->first();

                if ($payment) {

                    $event = Events::where('id',$payment->event_id)->first();
                    $payment->transaction_id = $event->slug.''.$payment->id;

                    $event_user = EventUser::where('event_id',$payment->event_id)->where('user_id', $payment->user_id)->first();
                    $event_user->has_upgraded = 1;
                    $event_user->save();

                    $payment->payment_intent = $data['payment_intent'];
                    $payment->status  =  $data['status'];
                    $payment->full_response = $data['fullresponse'];
                    $payment->payment_id = $data['payment_intent'];

                    $payment->address_id = $event_user->address_id;
                    $payment->save();

                    return $payment;
                }
            }

            public function getEventRewardQuantity($data){

                $user           = User::where('tgp_userid',$data['userId'])->first();
                $quantity_sizes = array();

                if($user){
                    $response = UserReward::select(['reward_id', 'size',DB::raw('SUM(quantity) as total_quantity')])
                    ->where('event_id',$data['eventId'])
                    ->where('user_id',$user->id)
                    ->whereExists(function ($query) {
                        $query->from('payments')
                              ->whereColumn('payments.id', 'user_rewards.payment_id')
                              ->where("status","successful");
                    })
                    ->groupBy('reward_id')->get();

                   // $plucked = $response->pluck('total_quantity','reward_id');

                    foreach($response as $res){

                        $quantity_sizes[$res->reward_id]['total_quantity']  = $res['total_quantity'];
                        $quantity_sizes[$res->reward_id]['size']            = $res['size'];
                    }

                    return $quantity_sizes;
                }else{
                    return null;
                }

            }

            public function getEventReferralData($eventId){
                $data['refer_data'] = EventSuccessPage::Where('event_id',$eventId)->select('invite_friend')->first();
                $data['socialShare']= SocialSeo::where('event_id', $eventId)->select('share_title','share_description')->first();
                return $data;

            }

            public function getPurchaseHistory($eventId, $userId){

                $user = User::where('id',$userId)->first();

                if( $user != null ) {
                    $paymentData = Payment::where('user_id', $user->id)
                    ->where('event_id', $eventId)
                    ->where('status', 'successful')
                    ->with('user_reward','user_reward.rewards')
                    ->get();
                    if( isset($paymentData) && !empty($paymentData)) {
                        foreach($paymentData as $payment) {
                            $userEvent = EventUser::
                                where('user_id', $user->id)
                                ->where('event_id', $eventId)
                                ->where('address_id', $payment->address_id)
                                // ->where('is_paid_user', 1)
                                ->first();
                            $payment->userEvent = $userEvent;
                        }
                    }

                    return $paymentData;
                }
            }
}
