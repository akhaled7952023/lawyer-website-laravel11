<?php
namespace App\Services\Dashboard\settings;

use App\Repositories\Dashboard\settings\ISettingRepository;
use App\Utils\ImageManger;

class SettingService implements ISettingService {

    protected $settingRepository,$imageManger;


    public function __construct(ISettingRepository $settingRepository , ImageManger $imageManger )
    {
        $this->settingRepository = $settingRepository;
        $this->imageManger = $imageManger;

    }

    public function getSetting($id){
        $setting = $this->settingRepository->getSetting($id);
        return $setting ?? abort(404);
    }
    public function updateSetting($data, $id){

        $setting = $this->getSetting($id);
        if(array_key_exists('logo', $data) && $data['logo'] != null){
            // delete old logo
            $oldImageName = $setting->logo;
            $oldImagePath = 'uploads/general/' . $oldImageName;
            $this->imageManger->deleteImageFromLocal($oldImagePath);

            $file_name = $this->imageManger->uploadSingleImage('/' , $data['logo'] , 'general');
            $data['logo'] = $file_name;
        }
        if (isset($data['adress_en'])) {
            $setting->setTranslation('adress', 'en', $data['adress_en']);
        }

        if (isset($data['adress_ar'])) {
            $setting->setTranslation('adress', 'ar', $data['adress_ar']);
        }
        if (isset($data['about_en'])) {
            $setting->setTranslation('about', 'en', $data['about_en']);
        }

        if (isset($data['adress_ar'])) {
            $setting->setTranslation('about', 'ar', $data['about_ar']);
        }
        return $this->settingRepository->updateSetting($data , $setting);
    }

}
