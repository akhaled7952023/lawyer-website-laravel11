<?php
namespace App\Repositories\Dashboard\Header;

use App\Models\Header;

class HeaderRepository implements IHeaderRepository{

public function getHeader($id){
    $header = Header::findOrFail($id);
    return $header;
}
public function updateHeader($request  ,  $header , $mainImage , $features = []){


    $header->update([
    'firstsolgan' => [
        'ar' => $request->firstsolgan_ar,
        'en' => $request->firstsolgan_en,
    ],
    'secondsolgan' => [
        'ar' => $request->secondsolgan_ar,
        'en' => $request->secondsolgan_en,
    ],
    'textbutton' => [
        'ar' => $request->textbutton_ar,
        'en' => $request->textbutton_en,
    ],

        'link' => $request->link,
        'image' => $mainImage,
        'features' => $features,

    ]);


    return $header;


}

}
