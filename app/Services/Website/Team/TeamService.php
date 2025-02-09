<?php
namespace App\Services\Website\Team;

use App\Repositories\Website\Team\ITeamRepository;

class TeamService implements ITeamService  {

    protected $iTeamRepository;

    public function __construct(ITeamRepository $iTeamRepository  )
    {
        $this->iTeamRepository = $iTeamRepository;

    }

    public function getAllTeam(){

        $members = $this->iTeamRepository->getAllTeam();

        if (!$members) {
            abort(404);
        }

        return $members;

    }
    public function getTeamBySlug($slug){

        $members = $this->iTeamRepository->getTeamBySlug($slug);

        if (!$members || $members->status != 1) {
            abort(404);
        }

        return $members;

    }

}
