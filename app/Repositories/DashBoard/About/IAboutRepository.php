<?php
namespace App\Repositories\Dashboard\About;


interface IAboutRepository{
public function updateAbout($about , $request , $file_name );
public function getAboutById($id);
public function getAbout();
}
