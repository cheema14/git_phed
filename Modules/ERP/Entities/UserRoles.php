<?php

namespace Modules\ERP\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserRoles extends Model
{
    protected $fillable=['user_id','role_id'];
    public static function save_user_roles($roles,$user_id){
        self::remove_roles($user_id);

        for ($i = 0; $i < sizeof($roles); $i++) {
            $data = [
                'role_id' => $roles[$i],
                'user_id' => $user_id,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ];

            DB::table('user_roles')->insert($data);
        }
        return true;
    }
    public static function remove_roles($user_id){
        DB::table('user_roles')->where('user_id',$user_id)->delete();
        return true;
    }
}
