<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permessions = [];
        foreach(config('permissions_en') as $permession=>$value){
            $permessions[] = $permession;
        }

        Role::create([
            'name'=>[
                'ar'=>'مدير',
                'en'=>'Manger',
            ],
            'permissions'=>$permessions,
        ]);
    }
}
