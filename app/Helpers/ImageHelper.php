<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\FilesUploadsLogs;
use App\Models\Events\Events;
use App\Models\Events\EventsMeta;

class ImageHelper
{
    public function deleteImage($path){
        Storage::disk('do')->delete($path);
    }

    public function uploadImage($img,$path,$width,$height,$format='jpg',$quality=75,$module='Events',$parentId=0){

        if($module == 'Events' && $parentId > 0){
            $event = Events::where('id',$parentId)->first();
            $path = $path.$event->slug.'/';
        }else if($module == 'Rewards' && $parentId > 0){
            $event = Events::where('id',$parentId)->first();
            $path = $path.$event->slug.'/rewards/';
        }else if($module == 'Rewards_sizing' && $parentId > 0){
            $event = Events::where('id',$parentId)->first();
            $path = $path.$event->slug.'/rewards/sizing';
        }
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $image = Image::make($image_base64);
        // $image->resize($width,$height)->encode($format,$quality);;
        $image->resize($width,$height,function($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode($format,$quality);
        $imageName = $path.time().'-'.rand(0,999999).'.'.$format;

       Storage::disk('do')->put($imageName, $image);

        return $imageName;
    }

    public function uploadFile($file,$path,$format,$module='Events',$parentId=0){
        if($module == 'Events' && $parentId > 0){
            $event = Events::where('id',$parentId)->first();
            if($event && $event->slug != ''){
                $path = $path.$event->slug.'/';
            }
        }


        $fileName = $path.time().'-'.rand(0,999999).'.'.$format;

        Storage::disk('do')->put($fileName, file_get_contents($file));

        return $fileName;
    }


    public function toggleActiveImages($image,$replacedImage = ''){
        if($image != ''){
            $fLog = FilesUploadsLogs::where('path',$image)->first();
            if($fLog){
                $fLog->active = 1;
                $fLog->save();
            }
        }

        if($replacedImage != ''){
            $fLog = FilesUploadsLogs::where('path',$replacedImage)->first();
            if($fLog){
                $fLog->active = 0;
                $fLog->save();
            }
        }
    }
}