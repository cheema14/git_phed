<?php

namespace Modules\ERP\Database\Seeders;
use Modules\ERP\Entities\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ArrayRecord = [
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('123456'),
            'email_verified_at'=>NOW(),
            'is_admin'=>1
        ];

        $user=User::firstOrCreate($ArrayRecord);
        $token = $user->createToken('auth_token');
    }
}
