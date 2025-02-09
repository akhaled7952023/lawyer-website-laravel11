<?php
namespace App\Repositories\Dashboard\Team;

use App\Models\Team;

class TeamRepository implements ITeamRepository{

    public function getAllMembers(){

        return Team::select('id', 'name', 'status')->paginate(10);
    }
    public function findMemberById($id){

        $member = Team::findOrFail($id);
        return $member;
    }
    public function createMember($request , $file_name){

        $member = Team::create([
            'name' => [
                'ar' => $request->name_ar ,
                'en' => $request->name_en ,
            ],
            'slug' => [
                'ar' => $request->input('slug.ar') ,
                'en' => $request->input('slug.en') ,
            ],
            'position' => [
                'ar' => $request->position_ar,
                'en' => $request->position_en,
            ],
            'experience' => [
                'ar' => $request->experience_ar,
                'en' => $request->experience_en,
            ],

            'bio' => [
                'ar' => $request->bio_ar,
                'en' => $request->bio_en,
            ],

            'meta_description' => [
                'ar' => $request->meta_description_ar,
                'en' => $request->meta_description_en,
            ],
            'meta_keywords' => [
                'ar' => $request->meta_keywords_ar,
                'en' => $request->meta_keywords_en,
            ],
            'meta_title' => [
                'ar' => $request->meta_title_ar,
                'en' => $request->meta_title_en,
            ],
            'image' => $file_name,
            'status' => $request->status,
            'years' => $request->years,
        ]);

        return $member;
    }

    public function updateMember($member, $request , $file_name){

            $member->update([

                'name' => [
                    'ar' => $request->name_ar ,
                    'en' => $request->name_en ,
                ],
                'slug' => [
                    'ar' => $request->input('slug.ar') ,
                    'en' => $request->input('slug.en') ,
                ],
                'position' => [
                    'ar' => $request->position_ar,
                    'en' => $request->position_en,
                ],
                'experience' => [
                    'ar' => $request->experience_ar,
                    'en' => $request->experience_en,
                ],

                'bio' => [
                    'ar' => $request->bio_ar,
                    'en' => $request->bio_en,
                ],

                'meta_description' => [
                    'ar' => $request->meta_description_ar,
                    'en' => $request->meta_description_en,
                ],
                'meta_keywords' => [
                    'ar' => $request->meta_keywords_ar,
                    'en' => $request->meta_keywords_en,
                ],
                'meta_title' => [
                    'ar' => $request->meta_title_ar,
                    'en' => $request->meta_title_en,
                ],
                'image' => $file_name,
                'status' => $request->status,
                'years' => $request->years,

            ]);

            return $member;

    }
    public function destroy($member){

        return $member->delete();
    }

}

