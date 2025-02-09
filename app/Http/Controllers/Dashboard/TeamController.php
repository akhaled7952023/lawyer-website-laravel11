<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Services\Dashboard\Team\ITeamService;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $iTeamService;

    public function __construct(ITeamService $iTeamService)
    {
        $this->iTeamService = $iTeamService;
    }
    public function index()
    {
        $members = $this->iTeamService->getAllMembers();
        return view('dashboard.team.index' , compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTeamRequest $request)
    {
        $member = $this->iTeamService->createMember($request);
        if(!$member){
            return back()->with('error', __('dashboard.error_msg'));
        }
        return redirect()->route('dashboard.teams.index')->with('success', __('dashboard.success_msg'));

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
        $member = $this->iTeamService->findMemberById($id);
        if(!$member){
            return back()->with('error', __('dashboard.error_msg'));
        }
        return view('dashboard.team.edit' , compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, string $id)
    {
        $member = $this->iTeamService->updateMember($id , $request);
        if(!$member){
            return back()->with('error', __('dashboard.error_msg'));
        }
        return redirect()->route('dashboard.teams.index')->with('success', __('dashboard.success_msg'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $member = $this->iTeamService->destroy($id);
        if(!$member){
             return back()->with('error', __('dashboard.error_msg'));
        }
        return redirect()->back()->with('success' , __('dashboard.success_msg'));
    }
}
