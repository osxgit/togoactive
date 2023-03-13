<?php

namespace App\Repositories;

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

use Carbon\Carbon;
use App\Repositories\Interfaces\EventRepositoryInterface;

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
        return Events::where('slug','LIKE','%'.$slug.'%')->with('images','dates','landingPage','rewards','eventMeta')->first();
    }

    public function getEventIdThroughSlug($slug){
        return Events::select('id')->where('slug','LIKE','%'.$slug.'%')->first();
    }
    
    public function getAllTeams($eventId){
        return Team::where('event_id',$eventId)->get();
    }

    public function createNewTeam($data){
        $team =  Team::create([
            'event_id' =>$data['eventId'],
            'team_name' => $data['team_name'],
        ]);

        if($team  ){
            $teamUser =  TeamUser::create([
                'user_id' =>$data['userid'],
                'team_id' => $team->id,
                'is_owner'=>1
            ]);

        }

        return $team;
    }
    
    public function validateCouponCode($data){
        $coupon = Coupon::where('event_id',$data['eventId'])->where('name','LIKE','%'.$data['couponCode'].'%')->first();
        if($coupon){
            $couponExpiryDate= $coupon->expiry_date;
            $couponExpiryDate = Carbon::Parse($couponExpiryDate)->toDateTimeString();
            $now = Carbon::now()->toDateTimeString();
            if($couponExpiryDate >= $now){

                if($coupon->max_use != -1){
                    $couponUsed = Payment::where('event_id',$data['eventId'])->where('coupon_code','LIKE','%'.$data['couponCode'].'%')->where('status',1)->count();
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
        

        
    }


}