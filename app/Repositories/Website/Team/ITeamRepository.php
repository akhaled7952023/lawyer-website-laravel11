<?php
namespace App\Repositories\Website\Team;


interface ITeamRepository{

    public function getAllTeam();
    public function getTeamBySlug($slug);

}
