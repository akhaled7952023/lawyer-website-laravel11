<?php
namespace App\Services\Website\Services;

use App\Repositories\Website\Services\IServicesRepository;

class ServicesService  implements IServicesService  {

    protected $iServiceRepository;


    public function __construct(IServicesRepository $iServiceRepository  )
    {
        $this->iServiceRepository = $iServiceRepository;

    }

    public function getServiceBySlug($slug)
{
    $service = $this->iServiceRepository->getServiceBySlug($slug);

    if (!$service || $service->status != 1) {
        abort(404);
    }

    return $service;
}
}
