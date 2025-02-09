<?php
namespace App\Repositories\Website\Team;

use App\Models\Team;

class TeamRepository implements ITeamRepository{

    public function getAllTeam(){

        return Team::active()
        ->select('slug', 'name', 'image', 'position' ,'status')
        ->get();
    }
    public function getTeamBySlug($slug){

        $locale = app()->getLocale();

        return Team::where("slug->{$locale}", $slug)->first();

    }



}
