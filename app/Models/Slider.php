<?php

namespace App\Models;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    private static $image, $imageName, $directory, $imageUrl;

    protected $fillable = ['slide_title', 'slide_subtitle','slide_image'];

    private static function getImageUrl($request)
    {
        self::$image = $request->file('slide_image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = "upload/slider-images/";
        self::$image->move(self::$directory, self::$imageName);
        // Resize the image using Intervention Image
        //create new manager instance with desred driver
        $imageManager = new ImageManager(new Driver());
        //Reading Upload imageFrom Local File system (uploads)
        $imageUrl = $imageManager->read(self::$directory .self::$imageName);
        //Resize the image
        $imageUrl->resize(240, 240); // Resize to 2, adjust as needed
        $imageUrl->save(self::$directory. self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }

    public static function newSlide($request)
    {
        self::$imageUrl = $request->file('slide_image') ? self::getImageUrl($request) : '';

        $slider = new Slider();
        self::saveBasicInfo($slider, $request, self::$imageUrl);
    }

    // public static function updateSlide($request, $slider)
    // {
    //     if ($request->file('slide_image')) {
    //         if (file_exists($slider->slide_image)) {
    //             unlink($slider->slide_image);
    //         }
    //         self::$imageUrl = self::getImageUrl($request);
    //     } else {
    //         self::$imageUrl = $slider->slide_image;
    //     }
    //     self::saveBasicInfo($slider, $request, self::$imageUrl);
    // }
     // Update an existing slide
     public static function updateSlide($request, $id)
     {
         // Fetch the team record using the ID
         $slider = self::findOrFail($id);
         if ($request->file('slide_image')) {
             if (file_exists($slider->slide_image)) {
                 unlink($slider->slide_image);
             }
             self::$imageUrl = self::getImageUrl($request);
         } else {
             self::$imageUrl = $slider->slide_image;
         }
         self::saveBasicInfo($slider, $request, self::$imageUrl);
     }

    private static function saveBasicInfo($slider, $request, $imageUrl)
    {
        $slider->slide_title = $request->slide_title;
        $slider->slide_subtitle = $request->slide_subtitle;
        $slider->slide_image = $imageUrl;
        $slider->save();
    }

    public static function deleteSlide($slider)
    {
        if (file_exists($slider->slide_image)) {
            unlink($slider->slide_image);
        }
        $slider->delete();
    }
    

}
