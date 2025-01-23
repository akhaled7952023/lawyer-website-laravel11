<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use App\Utils\ImageManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;
use Illuminate\Support\Facades\Session;
use App\Services\Dashboard\settings\ISettingService;

class SettingController extends Controller
{
    protected $settingService;
    public function __construct(ISettingService $settingService)
    {
        $this->settingService = $settingService;

    }
    public function index(){


        return view('dashboard.settings.setting');
    }

    public function update(SettingsRequest $request , $id)
    {
        $data = $request->except(['_token' , '_method']);
        $setting = $this->settingService->updateSetting($data , $id);
        if(!$setting){
            Session::flash('error' , __('dashboard.error_msg'));
            return redirect()->back();
        }
        Session::flash('success' , __('dashboard.success_msg'));
        return redirect()->back();

    }

}
