<?php
namespace App\Repositories\Dashboard\Skills;


interface ISkillsRepository{
public function updateSkill($skill , $data );
public function getSkill($id);
}
