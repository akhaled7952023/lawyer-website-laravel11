<?php
namespace App\Services\Dashboard\Skills;


interface ISkillService  {

    public function updateSkill($id , $data );
    public function getSkill($id);

}
