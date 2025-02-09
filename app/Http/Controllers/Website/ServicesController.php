<?php

namespace App\Http\Controllers\Website;

use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Services\Website\Services\IServicesService;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    protected $iServiceService;


    public function __construct(IServicesService $iServiceService  )
    {
        $this->iServiceService = $iServiceService;

    }

    public function show($slug)
    {
        $translatedSlug = TranslationHelper::getTranslatedSlug(\App\Models\Service::class, $slug);
        $service = $this->iServiceService->getServiceBySlug($slug);

        return view('website.services.show', compact('service' , 'translatedSlug'));
    }

}
