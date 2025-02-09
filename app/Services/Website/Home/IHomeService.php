<?php
namespace App\Services\Website\Home;

interface IHomeService  {

    public function getHeader();
    public function getAbout();
    public function getServices();
    public function getSkills();
    public function getClients();
    public function getFaq();
    public function getFaqDetails();
    public function getTestimonials();
    public function getTeamForHomePage();


}
