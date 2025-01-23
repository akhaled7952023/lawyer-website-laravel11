<?php
namespace App\Services\Dashboard\settings;


interface ISettingService  {

 public function getSetting($id);
 public function updateSetting($data, $id);


}
