<?php
namespace App\Services\Website\Home;

use App\Repositories\Website\Home\IHomeRepository;

class HomeService implements IHomeService  {

    protected $iHomeRepository;


    public function __construct(IHomeRepository $iHomeRepository  )
    {
        $this->iHomeRepository = $iHomeRepository;

    }

    public function getHeader(){

        return $this->iHomeRepository->getHeader();
    }
    public function getAbout(){
        return $this->iHomeRepository->getAbout();
    }
    public function getServices(){

        return $this->iHomeRepository->getServices();
    }
    public function getSkills(){
        return $this->iHomeRepository->getSkills();

    }
    public function getClients(){
        return $this->iHomeRepository->getClients();
    }

    public function getFaq(){

        return $this->iHomeRepository->getFaq();
    }

    public function getFaqDetails(){
        return $this->iHomeRepository->getFaqDetails();
    }
    public function getTestimonials(){
        return $this->iHomeRepository->getTestimonials();
    }
    public function getTeamForHomePage(){
        return $this->iHomeRepository->getTeamForHomePage();
    }

}
