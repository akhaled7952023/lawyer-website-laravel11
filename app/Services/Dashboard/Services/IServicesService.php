<?php
namespace App\Services\Dashboard\Services;

interface IServicesService {

    public function getAllServices();
    public function createService($request);
    public function findServiceById($id);
    public function updateService($id, $request);
    public function destroy($id);
}
