<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;
use App\Services\Dashboard\Faq\IFaqService;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $iFaqService;

     public function __construct(IFaqService $iFaqService)
     {
         $this->iFaqService = $iFaqService;

     }
    public function index()
    {
        $faq = $this->iFaqService->getAllFaqs();
        return view('dashboard.faq.index', compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request)
    {
        $faq = $this->iFaqService->createFaq($request);
        if(!$faq){
            return back()->withErrors('error', __('dashboard.error_msg'));
        }
        return redirect()->route('dashboard.faq.index')->with('success', __('dashboard.success_msg'));
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
        $faq = $this->iFaqService->findFaqById($id);
        if(!$faq){
            return back()->with('error', __('dashboard.error_msg'));
        }
        return view('dashboard.faq.edit' , compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqRequest $request,  $id)
    {
        $faq = $this->iFaqService->updateFaq($id , $request);

        if(!$faq){
            return back()->with('error', __('dashboard.error_msg'));
        }
        return redirect()->route('dashboard.faq.index')->with('success', __('dashboard.success_msg'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $faq = $this->iFaqService->destroy($id);
        if(!$faq){
             return back()->with('error', __('dashboard.error_msg'));
        }
        return redirect()->back()->with('success' , __('dashboard.success_msg'));
    }

    public function updatedetails(){

        return view('dashboard.faq.imagetitle');
    }
}
