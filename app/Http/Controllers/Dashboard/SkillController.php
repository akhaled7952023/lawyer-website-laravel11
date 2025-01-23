<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;
use App\Models\Skill;
use App\Services\Dashboard\Skills\ISkillService;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    protected $iSkillService;
    public function __construct(ISkillService $iSkillService)
    {
        $this->iSkillService = $iSkillService;

    }
    public function index(){

        $skills = Skill::first();

        return view('dashboard.skills.updateskills', compact('skills'));
    }

    public function update(SkillRequest $request, $id){

        $data = $request->except(['_token' , '_method']);
        $skill = $this->iSkillService->updateSkill($id , $data);
        if(!$skill){
            return back()->withErrors('error', __('dashboard.error_msg'));

        }
        return redirect()->route('dashboard.welcome')->with('success', __('dashboard.success_msg'));


    }
}
