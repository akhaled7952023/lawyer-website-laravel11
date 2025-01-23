<?php
namespace App\Repositories\Dashboard\settings;

use App\Models\Setting;

class SettingRepository implements ISettingRepository{

    public function getSetting($id){
        return Setting::find($id);
    }
    public function updateSetting($data, $setting){

        return $setting->update($data);
    }
}
