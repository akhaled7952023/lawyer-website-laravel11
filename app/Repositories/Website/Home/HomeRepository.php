<?php
namespace App\Repositories\Website\Home;

use App\Models\Header;
use App\Models\AboutUs;
use App\Models\Client;
use App\Models\Faq;
use App\Models\FaqDetail;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class HomeRepository implements IHomeRepository{

    public function getHeader(){
        return Header::first();
    }

    public function getAbout(){
        return AboutUs::first();
    }

    public function getServices(){

        return Service::active()
        ->select('slug', 'title', 'image', 'description')
        ->get()
        ->map(function ($service) {
            $cleanDescription = strip_tags($service->description);
            $service->description = Str::limit($cleanDescription, 70);
            return $service;
        });
    }

    public function getSkills(){
        return Skill::first();
    }

    public function getClients(){
        return Client::get();
    }

    public function getFaq(){

        return Faq::active()->get();
    }
    public function getFaqDetails(){
        return FaqDetail::first();
    }

    public function getTestimonials(){

        return Testimonial::active()->get();

    }

    public function getTeamForHomePage()
{
    return Team::active()
        ->select('slug', 'name', 'image', 'position')
        ->limit(3)
        ->get();
}


}
