<?php
namespace App\Repositories\Website\Services;

use App\Models\Service;

class ServicesRepository implements IServicesRepository{

    public function getServiceBySlug($slug)
    {
        $locale = app()->getLocale();

        return Service::where("slug->{$locale}", $slug)->first();
    }

}
