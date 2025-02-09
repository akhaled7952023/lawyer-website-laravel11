<?php
namespace App\Services\Website\Team;

interface ITeamService  {

    public function getAllTeam();
    public function getTeamBySlug($slug);

}
