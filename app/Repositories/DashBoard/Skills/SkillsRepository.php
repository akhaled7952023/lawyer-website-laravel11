<?php
namespace App\Repositories\Dashboard\Skills;

use App\Models\Skill;

class SkillsRepository implements ISkillsRepository
{
    public function getSkill($id)
    {
        return Skill::find($id);
    }

    public function updateSkill($skill, $data)
    {
         if (isset($data['title_ar'])) {
        $skill->setTranslation('title', 'ar', $data['title_ar']);
    }

    if (isset($data['title_en'])) {
        $skill->setTranslation('title', 'en', $data['title_en']);
    }
        return $skill->update($data);
    }
}
