<?php
namespace App\Services\Dashboard\Team;

interface ITeamService {

    public function getAllMembers();
    public function createMember($request );
    public function findMemberById($id);
    public function updateMember($id, $request );
    public function destroy($id);

}
