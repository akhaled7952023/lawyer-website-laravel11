<?php
namespace App\Services\Dashboard\About;


interface IAboutService  {

    public function updateAbout($id , $request  );
    public function getAboutById($id);
    public function getAbout();

}
