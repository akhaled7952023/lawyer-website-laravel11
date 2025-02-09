<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\Website\Home\IHomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $iHomeService;
    public function __construct(IHomeService $iHomeService  )
    {
        $this->iHomeService = $iHomeService;
    }
    public function index() {

        $header = $this->iHomeService->getHeader();
        $about = $this->iHomeService->getAbout();
        $services = $this->iHomeService->getServices();
        $skills = $this->iHomeService->getSkills();
        $clients = $this->iHomeService->getClients();
        $faq = $this->iHomeService->getFaq();
        $faqDetails = $this->iHomeService->getFaqDetails();
        $testimonials = $this->iHomeService->getTestimonials();
        $members = $this->iHomeService->getTeamForHomePage();
        return view('website.home' , compact('header' , 'about' , 'services' , 'skills' , 'clients','faq' , 'faqDetails', 'testimonials' , 'members'));
    }
}
