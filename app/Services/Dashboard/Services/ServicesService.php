<?php
namespace App\Services\Dashboard\Services;

use App\Repositories\Dashboard\Services\IServicessRepository;
use App\Utils\ImageManger;

class ServicesService implements IServicesService
{
    protected $IServiceRepository, $imageManger;

    public function __construct(IServicessRepository $IServiceRepository, ImageManger $imageManger)
    {
        $this->IServiceRepository = $IServiceRepository;
        $this->imageManger = $imageManger;
    }

    public function getAllServices()
    {
        return $this->IServiceRepository->getAllServices();
    }
    public function createService($request)
    {
        $file_name = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file_name = $this->imageManger->uploadSingleImage('/', $request->file('image'), 'general');

        }

        return $this->IServiceRepository->createService($request , $file_name);
    }

    public function findServiceById($id)
    {
        return $this->IServiceRepository->findServiceById($id);
    }
    public function updateService($request , $id)
    {

        $service = $this->findServiceById($id);
        $oldImageName = $service->image;
        $oldImagePath = 'uploads/general/' . $oldImageName;
        $file_name = $oldImageName;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $this->imageManger->deleteImageFromLocal($oldImagePath);
            $file_name = $this->imageManger->uploadSingleImage('/', $request['image'], 'general');
            $request['image'] = $file_name;
        }

        return $this->IServiceRepository->updateService($service, $request , $file_name);
    }
    public function destroy($id)
    {
        $service = $this->findServiceById($id);
        return $this->IServiceRepository->destroy($service);
    }
}
