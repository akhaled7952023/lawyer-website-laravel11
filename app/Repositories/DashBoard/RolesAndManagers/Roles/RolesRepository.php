<?php
namespace App\Repositories\Dashboard\RolesAndManagers\Roles;

use App\Models\Role;

class RolesRepository implements IRolesRepository{


    public function getAllRoles(){

        $roles = Role::select( 'id', 'name' , 'permissions')->paginate(10);
        return $roles;
    }
    public function getRole($id){

        $role = Role::find($id);
        return $role;
    }
    public function createRole($request){

        $role = Role::create([
            'name'=>[
                'ar'=>$request->name['ar'],
                'en'=>$request->name['en'],
            ],
            'permissions'=> $request->permissions,
       ]);

       return $role;
    }
    public function updateRole($request , $role){

        $role = $role->update([
            'name'=>[
                'ar'=>$request->name['ar'],
                'en'=>$request->name['en'],
            ],
            'permissions'=> $request->permissions,
        ]);
        return $role;
    }
    public function destroy($role){

        return $role->delete();
    }
}
