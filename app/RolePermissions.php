<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RolePermissions extends Model
{
    public static function save_role_permissions($permissions,$role_id){
        self::remove_permissions($role_id);
        for ($i = 0; $i < sizeof($permissions); $i++) {
            $data = [
                'permission_id' => $permissions[$i],
                'role_id' => $role_id,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ];

            DB::table('role_permissions')->insert($data);
        }
        return true;
    }
    public static function remove_permissions($role_id){
        DB::table('role_permissions')->where('role_id',$role_id)->delete();
        return true;
    }
}
