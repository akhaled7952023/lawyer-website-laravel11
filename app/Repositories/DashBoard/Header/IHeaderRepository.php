<?php
namespace App\Repositories\Dashboard\Header;


interface IHeaderRepository{
public function updateHeader($request  , $header , $mainImage ,$features = [] );
public function getHeader($id);
}
