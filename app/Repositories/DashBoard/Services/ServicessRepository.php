<?php
namespace App\Repositories\Dashboard\services;

use App\Models\Service;
use Mews\Purifier\Facades\Purifier;

class ServicessRepository implements IServicessRepository
{
    public function getAllServices()
    {
        return Service::select('id', 'title', 'status')->paginate(10);
    }
    public function createService($request ,  $file_name)
    {
        $service = Service::create([
            'title' => [
                'ar' => $request->input('title.ar') ,
                'en' => $request->input('title.en') ,
            ],
            'slug' => [
                'ar' => $request->input('slug.ar') ,
                'en' => $request->input('slug.en') ,
            ],
            'description' => [
                'ar' => $request->description_ar,
                'en' => $request->description_en,
            ],
            'meta_description' => [
                'ar' => $request->meta_description_ar,
                'en' => $request->meta_description_en,
            ],
            'meta_keywords' => [
                'ar' => $request->meta_keywords_ar,
                'en' => $request->meta_keywords_en,
            ],
            'meta_title' => [
                'ar' => $request->meta_title_ar,
                'en' => $request->meta_title_en,
            ],
            'image' => $file_name,
            'status' => $request->status,
        ]);

        return $service;
    }
    public function findServiceById($id)
    {
        $service = Service::findOrFail($id);
        return $service;
    }

    public function updateService($service, $request , $file_name)
    {
         $service->update([
            'title' => [
                'ar' => $request->title['ar'] ,
                'en' => $request->title['en'] ,
            ],
            'slug' => [
                'ar' => $request->slug['ar'] ,
                'en' => $request->slug['en']  ,
            ],
            'description' => [
                'ar' => $request->description_ar,
                'en' => $request->description_en,
            ],
            'meta_description' => [
                'ar' => $request->meta_description_ar,
                'en' => $request->meta_description_en,
            ],
            'meta_keywords' => [
                'ar' => $request->meta_keywords_ar,
                'en' => $request->meta_keywords_en,
            ],
            'meta_title' => [
                'ar' => $request->meta_title_ar,
                'en' => $request->meta_title_en,
            ],
            'image' => $file_name,
            'status' => $request->status,
        ]);

        return $service;
    }
    public function destroy($service)
    {
        return $service->delete();
    }
}
