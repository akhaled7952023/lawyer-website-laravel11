<?php
namespace App\Repositories\Dashboard\About;

use App\Models\AboutUs;

class AboutRepository implements  IAboutRepository{

public function updateAbout($about , $request , $file_name){

    $about->update([
        'title' => [
                'ar' => $request->title_ar,
                'en' => $request->title_en,
            ],
        'about_us' => [
                'ar' => $request->about_us_ar,
                'en' => $request->about_us_en,
            ],

            'image' => $file_name,
            'number' =>$request->number,
            'content' => $request->content,
    ]);

    return $about;

}
public function getAboutById($id){

    return AboutUs::find($id);
}

public function getAbout(){

    return AboutUs::first();
}

}
