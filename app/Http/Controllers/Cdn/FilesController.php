<?php

namespace App\Http\Controllers\Cdn;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Helpers\ImageHelper;
use App\Models\FilesUploadsLogs;
use App\Repositories\Interfaces\EventRepositoryInterface;

class FilesController extends Controller
{

    private $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function uploadFile(Request $request){

        $imageType = $request->idd;
        $module = $path = '';
        $width='';
        $height='';

        switch($request->idd){
            ## Event Cover
            case "cover":
                $module = 'Events';
                $imageHelper = new ImageHelper();
                $width=1920;
                $height=800;
                $path   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
            break;

            ## Event Logo
            case "icon":
                $module = 'Events';
                $imageHelper = new ImageHelper();
                $width=800;
                $height=300;
                $path   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
            break;

             ## Event Notification Image
             case "notification":
                $module = 'Events';
                $imageHelper = new ImageHelper();
                $width=500;
                $height=300;
                $path   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
            break;

            ## Event Reward Image
            case "rewards":
                $module = 'Events';
                $imageHelper = new ImageHelper();
                $width=350;
                $height=250;
                $path   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
            break;

            ## Event Reward Image
              case "event_name":
                $module = 'Events';
                $imageHelper = new ImageHelper();
                $width=700;
                $height=300;
                $path   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
            break;

            ## Event Reward Image
            case "slider_background":
                $module = 'Events';
                $imageHelper = new ImageHelper();
                $width=1120;
                $height=550;
                $path   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
            break;

            ## Event Reward Image
            case "slider_foreground":
                $module = 'Events';
                $imageHelper = new ImageHelper();
                $width=460;
                $height=370;
                $path   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
            break;

            ## Event Profile Icon
            case "profile_icon":
                $module = 'Events';
                $imageHelper = new ImageHelper();
                $width=300;
                $height=100;
                $path   = $imageHelper->uploadImage($request->image,'uploads/events/',300,100,'png',75,$module,$request->eventId ?? 0);
            break;

            ## Ebib
            case "ebib":
                $module = "Events";
                $imageHelper = new ImageHelper();
                $width=3508;
                $height=2480;
                $path   = $imageHelper->uploadImage($request->image,'uploads/events/',3508,2480,'jpg',85,$module,$request->eventId ?? 0);
            break;

            ## Certificate
            case "certificate":
                $module = "Events";
                $imageHelper = new ImageHelper();
                $width=3508;
                $height=2480;
                $path   = $imageHelper->uploadImage($request->image,'uploads/events/',3508,2480,'jpg',85,$module,$request->eventId ?? 0);
            break;

            ## Social Share
            case "share_image":
                $module = "Events";
                $imageHelper = new ImageHelper();
                $width=1200;
                $height=630;
                $path   = $imageHelper->uploadImage($request->image,'uploads/events/',1200,630,'jpg',85,$module,$request->eventId ?? 0);
            break;

            case "list_upload" :
                $module = "Events";
                $imageHelper = new ImageHelper();
                $width='';
                $height='';
                $path   = $imageHelper->uploadImage($request->file,'uploads/events/csv/','csv',$module,$request->eventId ?? 0);
            break;

            case "geojson_upload" :
                $module = "Events";
                $imageHelper = new ImageHelper();
                $width='';
                $height='';
                $path   = $imageHelper->uploadImage($request->file,'uploads/events/json/','json',$module,$request->eventId ?? 0);
            break;

            ## Event Reward Image
            case "rewards_image-1":
                $module = 'Rewards';
                $imageHelper = new ImageHelper();
                $width=1080;
                $height=1080;
                $path=$path_lg   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
                $width=500;
                $height=500;
                $path_md   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
                $width=70;
                $height=70;
                $path_sm   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);

            break;
            case "rewards_image-2":
                $module = 'Rewards';
                $imageHelper = new ImageHelper();
                $width=1080;
                $height=1080;
                $path=$path_lg   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
                $width=500;
                $height=500;
                $path_md   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
                            break;
            case "rewards_image-3":
                $module = 'Rewards';
                $imageHelper = new ImageHelper();
                $width=1080;
                $height=1080;
                $path=$path_lg   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
                $width=500;
                $height=500;
                $path_md   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
                            break;
            case "rewards_image-4":
                $module = 'Rewards';
                $imageHelper = new ImageHelper();
                $width=1080;
                $height=1080;
                $path=$path_lg   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
                $width=500;
                $height=500;
                $path_md   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
                            break;
            case "rewards_image-5":
                $module = 'Rewards';
                $imageHelper = new ImageHelper();
                $width=1080;
                $height=1080;
                $path=$path_lg   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
                $width=500;
                $height=500;
                $path_md   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
                            break;
            case "rewards_image-6":
                $module = 'Rewards';
                $imageHelper = new ImageHelper();
                $width=1080;
                $height=1080;
                $path=$path_lg   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
                $width=500;
                $height=500;
                $path_md   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
                            break;
            case "rewards_image-7":
                $module = 'Rewards';
                $imageHelper = new ImageHelper();
                $width=1080;
                $height=1080;
                $path=$path_lg   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
                $width=500;
                $height=500;
                $path_md   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
                            break;
            case "rewards_image-8":
                $module = 'Rewards';
                $imageHelper = new ImageHelper();
                $width=1080;
                $height=1080;
                $path=$path_lg   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
                $width=500;
                $height=500;
                $path_md   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
                            break;
            case "rewards_image-9":
                $module = 'Rewards';
                $imageHelper = new ImageHelper();
                $width=1080;
                $height=1080;
                $path=$path_lg   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
                $width=500;
                $height=500;
                $path_md   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
                break;
            case "sizing_image":

                $module = 'sizing_image';
                $imageHelper = new ImageHelper();
                 $width=580;
                $height=800;
                $path   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
            break;

            ## Achievement Icon
            case "achievement_icon":
                $module = 'Events';
                $imageHelper = new ImageHelper();
                $width = 150;
                $height = 150;
                $path   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
            break;
            case "achcievement_more_info_image":
                $module = 'Events';
                $imageHelper = new ImageHelper();
                $width = 1280;
                $height = 640;
                $path   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
            break;
            case "hero_image":
                $module = 'Events';
                $imageHelper = new ImageHelper();
                $width = 1280;
                $height = 600;
                $path   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
            break;
            case "sponsor-content-image":
                $module = 'Events';
                $imageHelper = new ImageHelper();
                $width = 300;
                $height = 150;
                $path   = $imageHelper->uploadImage($request->image,'uploads/events/',$width,$height,'png',75,$module,$request->eventId ?? 0);
            break;
        }
        // $eventImages = $this->eventRepository->getEventImages($request->eventId);
         if($module == 'Rewards' && $request->idd !== 'sizing_image'){
                 $fileupload_lg= FilesUploadsLogs::where('eventid',$request->rewardId)->where('module',$module)->where('image_type',$request->idd)->where('file_type','large')->first();
                 $fileupload_md= FilesUploadsLogs::where('eventid',$request->rewardId)->where('module',$module)->where('image_type',$request->idd)->where('file_type','medium')->first();
                 $fileupload_sm= FilesUploadsLogs::where('eventid',$request->rewardId)->where('module',$module)->where('image_type',$request->idd)->where('file_type','small')->first();

                  if($fileupload_lg){
                     $imageHelper->deleteImage($fileupload_lg->path);
                     $fileupload_lg->path = $path_lg;
                     $fileupload_lg->active = 0;
                     $fileupload_lg->save();
                  } else{
                     FilesUploadsLogs::create([
                        'eventid'    => $request->rewardId,
                        'file_type' => 'large',
                        'module'    => $module,
                        'image_type' => $request->idd,
                        'path'      => $path_lg
                    ]);
                }
                  if($fileupload_md){
                     $imageHelper->deleteImage($fileupload_md->path);
                     $fileupload_md->path = $path_md;
                     $fileupload_md->active = 0;
                     $fileupload_md->save();
                  } else{
                     FilesUploadsLogs::create([
                        'eventid'    => $request->rewardId,
                        'file_type' => 'medium',
                        'module'    => $module,
                        'image_type' => $request->idd,
                        'path'      => $path_md
                     ]);
                 }
                 if($request->idd == 'rewards_image-1'){
                    if($fileupload_sm){
                      $imageHelper->deleteImage($fileupload_sm->path);
                      $fileupload_sm->path = $path_sm;
                      $fileupload_sm->active = 0;
                      $fileupload_sm->save();
                    } else{
                         FilesUploadsLogs::create([
                             'eventid'    => $request->rewardId,
                             'file_type' => 'small',
                             'module'    => $module,
                             'image_type' => $request->idd,
                             'path'      => $path_sm
                         ]);
                     }
                 }
         } else{
            $fileupload= FilesUploadsLogs::where('eventid',$request->eventId)->where('module',$module)->where('image_type',$request->idd)->first();
                if($fileupload){
                    $imageHelper->deleteImage($fileupload->path);
                    $fileupload->path = $path;
                    $fileupload->active = 0;
                    $fileupload->save();
                } else{

                    FilesUploadsLogs::create([
                        'eventid'    => $request->eventId,
                        'file_type' => $imageType,
                        'module'    => $module,
                        'image_type' => $request->idd,
                        'path'      => $path
                    ]);


                }
         }




        if($path == ''){
            return response()->json(['err'=>1,'data' => null,'message' => 'Something went wrong! Please try again.']);
        }
        $fullpath = env('CDN_ROOT_PATH').'/'.$path;
        return response()->json(['err'=>0,'data' => ['path' => $path, 'fullpath' => $fullpath, 'idd' => $request->idd,'width'=>$width,'height'=>$height]]);
    }
}
