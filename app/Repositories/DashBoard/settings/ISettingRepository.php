<?php
namespace App\Repositories\Dashboard\settings;


interface ISettingRepository{

    public function getSetting($id);
    public function updateSetting($data, $setting);
}
