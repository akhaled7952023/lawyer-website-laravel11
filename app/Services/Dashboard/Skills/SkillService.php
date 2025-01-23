<?php
namespace App\Services\Dashboard\Skills;

use App\Repositories\Dashboard\Skills\ISkillsRepository;
use App\Utils\ImageManger;

class SkillService  implements  ISkillService  {

    protected $iSkillRepository,$imageManger;


    public function __construct(ISkillsRepository $iSkillRepository , ImageManger $imageManger )
    {
        $this->iSkillRepository = $iSkillRepository;
        $this->imageManger = $imageManger;

    }
    public function updateSkill($id , $data ){

        $skill =$this->getSkill($id);
        if(array_key_exists('image', $data) && $data['image'] != null){

            $oldImageName = $skill->image;
            $oldImagePath = 'uploads/general/' . $oldImageName;
            $this->imageManger->deleteImageFromLocal($oldImagePath);
            $file_name = $this->imageManger->uploadSingleImage('/' , $data['image'] , 'general');
            $data['image'] = $file_name;
        }


    return $this->iSkillRepository->updateSkill($skill , $data);


    }
    public function getSkill($id){

        $skill =  $this->iSkillRepository->getSkill($id);
        return  $skill ?? abort(404);
    }

}
