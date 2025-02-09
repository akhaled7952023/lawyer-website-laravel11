<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUsRequest;
use App\Services\Dashboard\About\IAboutService;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    protected $iAboutService;
    public function __construct(IAboutService $iAboutService)
    {
        $this->iAboutService = $iAboutService;

    }
    public function index(){

        $about = $this->iAboutService->getAbout();
        return view('dashboard.about.update' , compact('about'));
    }

    public function update($id , AboutUsRequest $request){

        $about = $this->iAboutService->updateAbout($id , $request);
        if(!$about){
            return back()->with('error', __('dashboard.error_msg'));
        }
        return redirect()->route('dashboard.welcome')->with('success', __('dashboard.success_msg'));

    }
}
