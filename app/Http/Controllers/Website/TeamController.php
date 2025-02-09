<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\Website\Team\ITeamService;
use App\Helpers\TranslationHelper;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    protected $iTeamService;

    public function __construct(ITeamService $iTeamService  )
    {
        $this->iTeamService = $iTeamService;

    }

    public function index(){
        $members = $this->iTeamService->getAllTeam();
        return view('website.team.index', compact('members'));
    }

    public function show($slug)
    {
        $translatedSlug = TranslationHelper::getTranslatedSlug(\App\Models\Team::class, $slug);

        $member = $this->iTeamService->getTeamBySlug($slug);


        return view('website.team.member', compact('member' , 'translatedSlug'));
    }

}
