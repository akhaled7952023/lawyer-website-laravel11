<?php
namespace App\Repositories\Dashboard\Team;


interface ITeamRepository{

    public function getAllMembers();
    public function createMember($request , $file_name);
    public function findMemberById($id);
    public function updateMember($member, $request , $file_name);
    public function destroy($member);

}




