<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Services\Dashboard\Services\IServicesService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $iServicesService;
    public function __construct(IServicesService $iServicesService)
    {
        $this->iServicesService = $iServicesService;

    }

    public function index()
    {
        $services = $this->iServicesService->getAllServices();
        return view('dashboard.services.index' , compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateServiceRequest $request)
    {

        $service = $this->iServicesService->createService($request);
        if(!$service){
            return back()->with('error', __('dashboard.error_msg'));
        }
        return redirect()->route('dashboard.services.index')->with('success', __('dashboard.success_msg'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $service = $this->iServicesService->findServiceById($id);
        if(!$service){
            return back()->with('error', __('dashboard.error_msg'));
        }
        return view('dashboard.services.edit' , compact('service'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, $id)
    {

        $service = $this->iServicesService->updateService($request , $id);
        if(!$service){
            return back()->with('error', __('dashboard.error_msg'));
        }
        return redirect()->route('dashboard.services.index')->with('success', __('dashboard.success_msg'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $service = $this->iServicesService->destroy($id);
       if(!$service){
            return back()->with('error', __('dashboard.error_msg'));
       }
       return redirect()->back()->with('success' , __('dashboard.success_msg'));

    }
}
