<?php
namespace App\Repositories\Dashboard\services;


interface IServicessRepository{

    public function getAllServices();
    public function createService($request , $file_name);
    public function findServiceById($id);
    public function updateService($service, $request , $file_name);
    public function destroy($service);

}




