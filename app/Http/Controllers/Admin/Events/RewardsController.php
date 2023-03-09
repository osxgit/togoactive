<?php

namespace App\Http\Controllers\Admin\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Events\Events;
use App\Models\Events\EventsMeta;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\EventRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use App\Models\FilesUploadsLogs;
use App\Helpers\CountryHelper;

class RewardsController extends Controller
{
    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function renderRewardsSection($eventId){
        $assetsPath = env('CDN_ASSETS_PATH');
        $rootAssetPath = env('CDN_ROOT_PATH');
        if($eventId == '-'){
            return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;
        }else {
            $event = Events::findOrFail($eventId);
            $eventRewards = $this->eventRepository->getRewards($eventId);
        }
        if(count($eventRewards)>0){
            $eventCoreRewards = $this->eventRepository->getCoreRewards($eventId);
            foreach($eventCoreRewards as $key=>$cr){

                $images=json_decode($cr->rewards_images);
                $icon= $images->small[0];
                $cr->icon =  $rootAssetPath.'/'.$icon;
                if($cr->price !=''){
                    $pricestr='';
                    foreach(json_decode($cr->price) as $price){
                        $pricestr .= $price->currency." : ".$price->price." | " ;
                    }
                     $pricestr=rtrim($pricestr, '| ');
                } else{
                   $pricestr='';
                }
                $cr->price = $pricestr;
            }

            $eventAddonRewards = $this->eventRepository->getAddonRewards($eventId);
            foreach($eventAddonRewards as $cr){
                $images=json_decode($cr->rewards_images);
                $icon= $images->small[0];
                $cr->icon =  $rootAssetPath.'/'.$icon;
                if($cr->price !=''){
                    $pricestr='';
                    foreach(json_decode($cr->price) as $price){
                        $pricestr .=$price->currency." : ".$price->price." | " ;
                    }
                   $pricestr=rtrim($pricestr, '| ');
                } else{
                    $pricestr='';
                }
                $cr->price = $pricestr;
            }
            $isadd=false;
        } else{
            $isadd=true;
        }
        return view('templates.admin.events.rewards.rewards',['id' => $eventId,'isadd' =>$isadd, 'route_name' => request()->route()->getName(), 'active_page' => 'Reward SKUs', 'eventRewards' => $eventRewards ?? null, 'coreRewards'=> $eventCoreRewards ?? null, 'addonRewards'=> $eventAddonRewards ?? null ,'event'=> $event ?? null]);

    }
    public function addRewardsSection($eventId){

        if($eventId == '-'){
                return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;
        }else {
                $event = Events::findOrFail($eventId);
        }
        $isadd=true;
        return view('templates.admin.events.rewards.add',['id' => $eventId,'isadd' =>$isadd, 'route_name' => request()->route()->getName(), 'active_page' => 'Basic details','event'=> $event ?? null, 'rewards' =>$rewards ?? null]);

    }
    public function submitRewardsDetails(Request $request,$eventId){
        if($eventId == '-'){
            return  back()->with('error','Please add an event!');
        }

        Validator::make($request->all(), [
                    'images_1'=>'required',
                    'name' => 'required',
                    'sku' => 'required',
                    // 'description' => 'required',
                    'max_quantity' => 'required|numeric|min:1',
                    'size' => 'sometimes|required_with:enable_sizing',
                    'sizing_images' => 'sometimes|required_with:enable_sizing',
        ],['images_1.required'=>'please add a reward image'])->validate();

        dd($request->all());
        $data=$request->all();
        $data['reward_image']=[];
        $alldata=$request->all();
   
        for($i=1; $i<=9 ;$i++){
            if(isset($alldata['images_'.$i])){
                $rewardimages= FilesUploadsLogs::where('eventid',0)->where('module','Rewards')->where('image_type','rewards_image-'.$i)->where('active',0)->get();
                foreach($rewardimages as $rewardimage){
                    $data['reward_image'][$rewardimage->file_type][]=$rewardimage->path;
                    if($rewardimage){
                        $rewardimage->active = 1;
                        $rewardimage->save();
                    }
                }

            }
        }
        if(isset($alldata['sizing_images'])){
             $sizingimage= FilesUploadsLogs::where('eventid',$eventId)->where('module','Rewards')->where('image_type','sizing_image')->where('active',0)->first();
             $data['sizing_images']=$sizingimage->path;
             if($sizingimage){
                 $sizingimage->active = 1;
                 $sizingimage->save();
             }
        } else{
            $data['sizing_images']='';
        }
        if(isset($request->size)){
        $sizevalue=[];

                                foreach(json_decode($request->size) as $size){

                                    array_push($sizevalue,$size->value);
                                }
                            $data['size']=json_encode($sizevalue);
        } else{
         $data['size']='';
        }
//         $size=isset($request->size)?json_encode(array_filter(explode(',',$request->size))):'';
//         $data['size']=$size;

        $eventRewards = $this->eventRepository->createEventRewards($data,$eventId);
     
         for($i=1; $i<=9 ;$i++){
                    if(isset($alldata['images_'.$i])){
                        $rewardimages= FilesUploadsLogs::where('eventid',0)->where('module','Rewards')->where('image_type','rewards_image-'.$i)->where('active',1)->get();
                        foreach($rewardimages as $rewardimage){
                            if($rewardimage){
                               $rewardimage->eventid = $eventRewards->id;
                                $rewardimage->save();
                            }
                        }

                    }
                }

        return redirect()->route('admin.events.rewardsPrice.add',array($eventId, $eventRewards->id))->with('message','Changes saved successfully!');

    }

    public function renderMultiQuantityDiscountSection($eventId){
            if($eventId == '-'){
                    return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;

                }else {
                    $event = Events::findOrFail($eventId);
                }

                $isadd=true;
                $discount = $this->eventRepository->getMultiQuantityDiscount($eventId);
// dd($discount);

                return view('templates.admin.events.rewards.discount',['id' => $eventId,'isadd' =>$isadd, 'route_name' => request()->route()->getName(), 'active_page' => 'Multi-item Discount', 'discount' => $discount ?? null,'event'=> $event ?? null]);

        }

        public function submitMultiQuantityDiscountDetails(Request $request,$eventId){
            if($eventId == '-'){
                return  back()->with('error','Please add an event!');
            }
Validator::make($request->all(), [
                                        'condition'=>'required',
                                      'quantity' => 'required|numeric',
                                      'discount' => 'required|numeric',
                                  ])->validate();
            if(isset($request->discountId) && $request->discountId != 0){
                $eventDiscount = $this->eventRepository->editMultiQuantityDiscount($request, $eventId);
            } else{
                $eventDiscount = $this->eventRepository->storeMultiQuantityDiscount($request, $eventId);
            }

                    return redirect()->route('admin.events.multiQuantityDiscount',array($eventId, $eventId))->with('message','Changes saved successfully!');

        }

        public function addRewardsPriceSection($eventId, $rewardId =0){
            if($eventId == '-'){
                return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;

            }else {
                $event = Events::findOrFail($eventId);
            }
            if($rewardId >0){
                $eventRewards = $this->eventRepository->getEventRewards($eventId, $rewardId);

                $rewardPrice= $eventRewards->price != '' ?json_decode($eventRewards->price) :null;

            }

            $isadd=true;
            $countryHelper = new CountryHelper();
            $countryCurrency= $countryHelper->country_currency();
            if( $eventRewards->restrict_to_country == 1){
                if($eventRewards->countries_allowed != ''){
                 $event_countries_array= json_decode($eventRewards->countries_allowed);
                      $eventRewards->countries_allowed=implode(",",json_decode($eventRewards->countries_allowed));
                } else{
                    $event_countries_array=[];
                }

                $global =0;


            } else{
                if($eventRewards->price !=''){
                    $price= json_decode($eventRewards->price, true);

                    if(count($price) > 0){
                        $global=$price[0];
                        unset($price[0]);
                        if(count($price) >0){
                                                $eventRewards->price= json_encode($price);

                        } else{
                        $eventRewards->price='';
                        }
                    } else{
                    $eventRewards->price='';
                    }


                }


             $event_countries_array=[];
                $eventRewards->countries_allowed='';
            }


            return view('templates.admin.events.rewards.price',['global'=> $global ?? null,'event_countries_array'=>$event_countries_array ,'rewardPrice'=>$rewardPrice,'rewardId'=> $rewardId,'countryCurrency'=> $countryCurrency,'id' => $eventId,'isadd' =>$isadd,'rewards' => $eventRewards, 'route_name' => request()->route()->getName(), 'active_page' => 'Basic details','event'=> $event ?? null]);

        }

        public function submitRewardsPriceDetails(Request $request,$eventId,$rewardId){
        Validator::make($request->all(), [
                            'countries_allowed' => 'sometimes|required_with:restrict_to_country',
                        ])->validate();
            $countryHelper = new CountryHelper();
            $countryCurrency= $countryHelper->country_currency();

            $data=$request->all();
            $currencyPrice= $request->except(['_token', 'challengeId','global_currency','event_images_save','restrict_to_country','countries_allowed']);

             if(isset($data['global_currency']) && !is_null($data['global_currency'])){
                 $data['price'][0]['country'] = 'Global';
                 $data['price'][0]['currency'] = 'USD';
                 $data['price'][0]['price'] = $data['global_currency'];
             }

            foreach( $currencyPrice as $key=>$cp){
             $value=explode("_",$key);
                if(!is_null($cp)){
                    $data['price'][$value[1]][$value[0]]=$cp;
                    foreach($countryCurrency as $cc){
                        if($cc['country'] == $cp){
                            $data['price'][$value[1]]['currency']=$cc['currency_code'];
                        }
                    }
                }
                if($value[0] == 'price' && is_null($cp) ){
                    unset($data['price'][$value[1]]);
                }
            }

            $eventPrice = $this->eventRepository->createEventRewardPrice($data,$rewardId);

            return redirect()->route('admin.events.rewards',$eventId )->with('message','Changes saved successfully!');


        }

        public function toggleIsDependent(Request $request){
            $reward = $this->eventRepository->toggleEventRewardIsDependent($request->rewardId);
            return response()->json(['err'=>0]);

        }

        public function updateDependentSku(Request $request){
              $reward = $this->eventRepository->updateRewardDependentSku($request->rewardId, $request->dependent_sku);
              return response()->json(['err'=>0]);

        }

        public function toggleRewardVisibility(Request $request){
            $reward = $this->eventRepository->toggleReward($request->rewardId);
            return response()->json(['err'=>0,'data'=>$reward->is_hidden]);
        }

        public function rewardsInstructionSection($eventId){


            if($eventId == '-'){
                return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;

            }else {
                $event = Events::findOrFail($eventId);
            }
            $isadd=true;
            $reward_instructions = $this->eventRepository->getEventMeta($eventId,'reward_instructions');
            $addon_instructions = $this->eventRepository->getEventMeta($eventId,'addon_instructions');
            if( $reward_instructions || $addon_instructions ){
            $isadd=false;
            }

            return view('templates.admin.events.rewards.instructions',['reward_instructions'=> $reward_instructions ?? null,'addon_instructions' => $addon_instructions ?? null,'id' => $eventId,'isadd' =>$isadd, 'route_name' => request()->route()->getName(), 'active_page' => 'Rewards Introduction','event'=> $event ?? null]);

        }

        public function submitRewardsInstruction(Request $request,$eventId){

          Validator::make($request->all(), [
                                      'reward_instructions' => 'required',
                                      'addon_instructions' => 'required',
                                  ])->validate();

            $reward_instructions = $this->eventRepository->getEventMeta($eventId,'reward_instructions');
            $addon_instructions = $this->eventRepository->getEventMeta($eventId,'addon_instructions');
            if( !is_null($reward_instructions)  && $request->reward_instructions =='' ){
                $this->eventRepository->updateEventMeta($eventId, 'reward_instructions', $request->reward_instructions);
            } else if( !is_null($reward_instructions)   &&  $request->reward_instructions !=''){
                $this->eventRepository->updateEventMeta($eventId, 'reward_instructions', $request->reward_instructions);
            } else if(is_null($reward_instructions) &&  $request->reward_instructions  !=''){
                  $event_domain = $this->eventRepository->addEventMeta($eventId,'reward_instructions', $request->reward_instructions);
            }

            if( !is_null($addon_instructions)  && $request->addon_instructions =='' ){
                            $this->eventRepository->updateEventMeta($eventId, 'addon_instructions', $request->addon_instructions);
                        } else if( !is_null($addon_instructions)   &&  $request->addon_instructions !=''){
                            $this->eventRepository->updateEventMeta($eventId, 'addon_instructions', $request->addon_instructions);
                        } else if(is_null($addon_instructions) &&  $request->addon_instructions  !=''){
                              $addon_instructions = $this->eventRepository->addEventMeta($eventId,'addon_instructions', $request->addon_instructions);
                        }

            return redirect()->route('admin.events.rewards',$eventId )->with('message','Changes saved successfully!');

        }

        public function editRewardsSection($eventId, $rewardId){

            if($eventId == '-'){
                return redirect()->route('admin.events.info.essentials','-')->with('warining','Please add the event first');;
            }else {
                $event = Events::findOrFail($eventId);
            }

             if($rewardId){
                $eventRewards = $this->eventRepository->getEventRewards($eventId, $rewardId);
                $rewardImages = json_decode($eventRewards->rewards_images);
                $rewardCount= count($rewardImages->large);

             } else {
                return redirect()->route('admin.events.rewards.add','-')->with('warining','Please add the reward first');;
             }

             $isadd=false;
            return view('templates.admin.events.rewards.edit',['rewardImages'=> $rewardImages,'rewardCount'=> $rewardCount, 'id' => $eventId,'isadd' =>$isadd, 'route_name' => request()->route()->getName(), 'active_page' => 'Basic details','event'=> $event ?? null, 'rewards' =>$eventRewards ?? null]);

        }

        public function updateRewardsSection(Request $request,$eventId, $rewardId){
            Validator::make($request->all(), [
                    'name' => 'required',
                    'sku' => 'required',
                    // 'description' => 'required',
                    'max_quantity' => 'required|numeric|min:1',
                    'size' => 'sometimes|required_with:enable_sizing',
                    'sizing_images' => 'sometimes|required_with:enable_sizing',
                ])->validate();
//                  $size=isset($request->size)?json_encode(array_filter(explode(',',$request->size))):'';

                $eventRewards = $this->eventRepository->getEventRewards($eventId, $rewardId);
                $rewardImages = json_decode($eventRewards->rewards_images);
                   $data= $request->all();
                foreach($rewardImages as $key=>$reward_img){
                foreach($reward_img as $rewardImg){
                $data['reward_image'][$key][]=$rewardImg;
                }


                }


             for($i=1; $i<=9 ;$i++){
             $count=$i-1;
                        if(isset($data['images_'.$i])){
                            $rewardimages= FilesUploadsLogs::where('eventid',$rewardId)->where('module','Rewards')->where('image_type','rewards_image-'.$i)->get();
                            foreach($rewardimages as $rewardimage){
                                $data['reward_image'][$rewardimage->file_type][ $count]=$rewardimage->path;
                                if($rewardimage){
                                    $rewardimage->active = 1;
                                    $rewardimage->save();
                                }
                            }

                        }
                    }

                    if(isset($data['sizing_images'])){
                         $sizingimage= FilesUploadsLogs::where('eventid',$eventId)->where('module','Rewards')->where('image_type','sizing_image')->where('active',0)->first();
                         $data['sizing_images']=$sizingimage->path;
                         if($sizingimage){
                             $sizingimage->active = 1;
                             $sizingimage->save();
                         }
                    } else{
                        $data['sizing_images']=$eventRewards->sizing_images;
                    }
if(isset($request->size)){
$sizevalue=[];

                        foreach(json_decode($request->size) as $size){

                            array_push($sizevalue,$size->value);
                        }
                    $data['size']=json_encode($sizevalue);
} else{
 $data['size']='';
}


                    $eventRewards = $this->eventRepository->editEventRewards($data,$rewardId);

                    return redirect()->route('admin.events.rewards',$eventId )->with('message','Changes saved successfully!');

        }

        function deleteMultiQuantityDiscountDetails(Request $request,$eventId, $discountid){
                if($eventId == '-'){
                       return  back()->with('error','Please add an event!');
                }

                $eventDiscount = $this->eventRepository->deleteMultiQuantityDiscount($eventId, $discountid);


                return redirect()->route('admin.events.multiQuantityDiscount',array($eventId, $eventId))->with('message','Changes saved successfully!');

        }


        public function sortRewardsDetails(Request $request,$eventId){

        if($eventId == '-'){
                             return  back()->with('error','Please add an event!');
                      }

                $reward = $this->eventRepository->sortRewards($request->all(),$eventId );

                    return response()->json(['err'=>0]);
        }

        public function removeRewardPrice (Request $request){

            $reward = $this->eventRepository->removePriceRewards($request);
            return response()->json(['err'=>0]);
        }



}
