<?php
namespace App\Services\Dashboard\Team;

use App\Repositories\Dashboard\Team\ITeamRepository;
use App\Utils\ImageManger;

class TeamService implements  ITeamService {

    protected $ITeamRepository, $imageManger;

    public function __construct(ITeamRepository $ITeamRepository, ImageManger $imageManger)
    {
        $this->ITeamRepository = $ITeamRepository;
        $this->imageManger = $imageManger;
    }

    public function getAllMembers(){
        return $this->ITeamRepository->getAllMembers();
    }
    public function createMember($request ){

        $file_name = 'default.png';

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file_name = $this->imageManger->uploadSingleImage('/', $request->file('image'), 'general');
        }
        return $this->ITeamRepository->createMember($request , $file_name);
    }
    public function findMemberById($id){
        return $this->ITeamRepository->findMemberById($id);
    }
    public function updateMember($id, $request ){
        $member = $this-> findMemberById($id);
        $oldImageName = $member->image;
        $file_name = $oldImageName;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $oldImagePath = 'uploads/general/' . $oldImageName;
            $this->imageManger->deleteImageFromLocal($oldImagePath);
            $file_name = $this->imageManger->uploadSingleImage('/', $request['image'], 'general');
        }
        return $this->ITeamRepository->updateMember($member, $request , $file_name);

    }
    public function destroy($id){
        $member = $this-> findMemberById($id);
        return $this->ITeamRepository->destroy($member);
    }

}
