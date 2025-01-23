<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateHeaderRequest;
use App\Models\Header;
use App\Services\Dashboard\Header\IHeaderService;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    protected $iHeaderService;
    public function __construct(IHeaderService $iHeaderService)
    {
        $this->iHeaderService = $iHeaderService;

    }
    public function index(){

        $header = Header::first();

        return view('dashboard.header.updateheaer', compact('header'));
    }

    public function update(UpdateHeaderRequest $request , $id){

        $header = $this->iHeaderService->updateHeader($request , $id);

        if(!$header){
            return back()->with('error', __('dashboard.error_msg'));
        }
        return redirect()->route('dashboard.services.index')->with('success', __('dashboard.success_msg'));


    }
}
