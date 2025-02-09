<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Services\Dashboard\Testimonials\ITestimonialService;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $iTestimonialService;

     public function __construct(ITestimonialService $iTestimonialService)
     {
         $this->iTestimonialService = $iTestimonialService;
     }
    public function index()
    {
        $testmonials = $this->iTestimonialService->getAllTestimonials();
        return view('dashboard.Testmonials.index' , compact('testmonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.Testmonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialRequest $request)
    {
        $testmonial = $this->iTestimonialService->createTestimonial($request);
        if(!$testmonial){
            return back()->withErrors('error', __('dashboard.error_msg'));
        }
        return redirect()->route('dashboard.testimonials.index')->with('success', __('dashboard.success_msg'));
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
        $testmonial = $this->iTestimonialService->findTestimonialById($id);
        if(!$testmonial){
            return back()->with('error', __('dashboard.error_msg'));
        }
        return view('dashboard.Testmonials.edit' , compact('testmonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialRequest $request,  $id)
    {

        $testmonial = $this->iTestimonialService->updateTestimonial($id , $request);

        if(!$testmonial){
            return back()->with('error', __('dashboard.error_msg'));
        }
        return redirect()->route('dashboard.testimonials.index')->with('success', __('dashboard.success_msg'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testmonial = $this->iTestimonialService->destroy($id);
       if(!$testmonial){
            return back()->with('error', __('dashboard.error_msg'));
       }
       return redirect()->back()->with('success' , __('dashboard.success_msg'));
    }
}
