<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use App\User;
use App\UserRoles;
use App\RolePermissions;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use stdClass;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;

class UserController extends Controller
{
    public function __construct()
    {
        if (auth('sanctum')->check()) {
            $user_id = auth('sanctum')->user()->id;
            if ($user_id != 1) {
                echo json_encode([
                    'status' => false,
                    'messages' => [
                        'You are not authorized to perform this action.'
                    ]
                ]);
                exit;
            }
        }
    }
    public function save_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users,email'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        if ($user = User::create($data)) {
            $role_data = [
                'user_id' => $user->id,
                'role_id' => $request->role_id
            ];
            $this->save_user_roles($request, $role_data);

            $token = $user->createToken('auth_token')->plainTextToken;
            $data = User::orderBy('id', 'DESC')->first();
            $data->access_token = $token;
            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ];
            try {
                \Mail::to($request->email)->send(new \App\Mail\UserGreetingMail($details));
            } catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    'Error' => $e->getMessage(),
                    'Code' => $e->getCode(),
                    'Line' => $e->getLine(),
                    'File' => $e->getFile()
                ]);
            }
            return json_encode([
                'status' => true,
                'data' => $data
            ]);
        } else {
            return json_encode([
                'status' => false,
                'messages' => [
                    'Error occured while storing the data'
                ]
            ]);
        }
    }

    public function update_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'id'=>'required',
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if (User::where('id',$request->id)->update($data)) {
            $role_data = [
                'user_id' => $request->id,
                'role_id' => $request->role_id
            ];
            UserRoles::where('user_id',$request->id)->delete();
            $this->save_user_roles($request, $role_data);

            $data = User::where('id', $request->id)->first();

            return json_encode([
                'status' => true,
                'data' => $data
            ]);
        } else {
            return json_encode([
                'status' => false,
                'messages' => [
                    'Error occured while storing the data'
                ]
            ]);
        }
    }

    public function delete_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        if (!User::find($request->id)) {
            return json_encode([
                'status' => false,
                'messages' => [
                    'User not exist with this id'
                ]
            ]);
        }
        if (User::find($request->id)->delete()) {
            return json_encode([
                'status' => true,
                'data' => 'User deleted successfully'
            ]);
        } else {
            return json_encode([
                'status' => false,
                'messages' => [
                    'Error occured while deleting the user'
                ]
            ]);
        }
    }

    public function list_permission(Request $request)
    {
        $data = Permission::whereNotNull("id");
        $data = $data->paginate($request->length);
        if ($data->count()) {
            foreach ($data as $iKey => $item) {
                $item->counter = $request->page > 1 ? ((($request->page - 1) * $request->length) + ($iKey + 1)) : $iKey + 1;
            }
        }
        return new DataTableCollectionResource($data);
    }

    public function list_role(Request $request)
    {
        $data = Role::whereNotNull("id");
        $data = $data->paginate($request->length);
        if ($data->count()) {
            foreach ($data as $iKey => $item) {
                $item->permissions=RolePermissions::where('role_id',$item->id)->pluck('permission_id');
                $item->counter = $request->page > 1 ? ((($request->page - 1) * $request->length) + ($iKey + 1)) : $iKey + 1;
            }
        }
        return new DataTableCollectionResource($data);
    }
    public function get_roles(Request $request)
    {
        $data = Role::all();
        if ($data->count()) {
            foreach ($data as $iKey => $item) {
                $item->counter = $request->page > 1 ? ((($request->page - 1) * $request->length) + ($iKey + 1)) : $iKey + 1;
            }
        }
        return json_encode($data);
    }
    public function get_permissions(Request $request)
    {
        $data = Permission::all();
        if ($data->count()) {
            foreach ($data as $iKey => $item) {
                $item->counter = $request->page > 1 ? ((($request->page - 1) * $request->length) + ($iKey + 1)) : $iKey + 1;
            }
        }
        return json_encode($data);
    }

    public function list_user(Request $request)
    {
        $data = User::whereNotNull("id")->where('is_admin', 0);
        $data = $data->paginate($request->length);
        if ($data->count()) {
            foreach ($data as $iKey => $item) {
                $user_role = $this->get_single_user_role($item->id);

                $item->role = [
                    'role_id' => '',
                    'role' => ''
                ];
                if ($user_role != null) {
                    $role_data=[
                        'id'=>$user_role->id,
                        'name'=>$user_role->name,
                    ];
                    $item->role = $role_data;
                    
                }

                // if ($item->id == 3) {
                //     return json_encode($user_role);
                // }
                $item->counter = $request->page > 1 ? ((($request->page - 1) * $request->length) + ($iKey + 1)) : $iKey + 1;
            }
        }
        return new DataTableCollectionResource($data);
    }

    public function get_single_user_role($user_id)
    {
        $data_user_role = UserRoles::where('user_id', $user_id)->first();
        if (!empty($data_user_role)) {
            $data = Role::where('id', $data_user_role->role_id)->first();
            return $data;
        } else {
            return null;
        }
    }

    public function save_permission(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $data = [
            'name' => $request->name,
            'slug' => $request->slug
        ];

        if (Permission::create($data)) {
            return json_encode([
                'status' => true,
                'data' => Permission::orderBy('id', 'DESC')->first()
            ]);
        } else {
            return json_encode([
                'status' => false,
                'messages' => [
                    'Error occured while storing the data'
                ]
            ]);
        }
    }

    public function save_role(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $data = [
            'name' => $request->name,
            'slug' => $request->slug
        ];

        if (Role::create($data)) {
            return json_encode([
                'status' => true,
                'data' => Role::orderBy('id', 'DESC')->first()
            ]);
        } else {
            return json_encode([
                'status' => false,
                'messages' => [
                    'Error occured while storing the data'
                ]
            ]);
        }
    }

    public function update_permission(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
            'id' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $data = [
            'name' => $request->name,
            'slug' => $request->slug
        ];

        if (Permission::where('id', $request->id)->update($data)) {
            return json_encode([
                'status' => true,
                'data' => Permission::where('id', $request->id)->first()
            ]);
        } else {
            return json_encode([
                'status' => false,
                'messages' => [
                    'Error occured while updating the data'
                ]
            ]);
        }
    }

    public function update_role(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
            'id' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $data = [
            'name' => $request->name,
            'slug' => $request->slug
        ];

        if (Role::where('id', $request->id)->update($data)) {
            return json_encode([
                'status' => true,
                'data' => Role::where('id', $request->id)->first()
            ]);
        } else {
            return json_encode([
                'status' => false,
                'messages' => [
                    'Error occured while updating the data'
                ]
            ]);
        }
    }

    public function save_role_permission(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role_id' => 'required',
            'permissions' => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $permissions = $request->permissions;
        $permissions = explode(',',$permissions);
        //return $permissions;
        RolePermissions::where('role_id',$request->role_id)->delete();
        RolePermissions::save_role_permissions($permissions, $request->role_id);

        return json_encode([
            'status' => true,
            'messages' => [
                'Role permissions added successfully'
            ]
        ]);
    }

    public function save_user_roles(Request $request, $data = [])
    {
        if (!empty($data)) {
            UserRoles::create($data);
            return true;
        }
        $validator = Validator::make($request->all(), [
            'user_id' => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $roles = $request->role;
        UserRoles::save_user_roles($roles, $request->user_id);

        return json_encode([
            'status' => true,
            'data' => 'Data saved successfully'
        ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return json_encode([
                'status' => false,
                'data' => 'Invalid login credentials'
            ]);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;
        $user->access_token = $token;
        $user->token_type = 'Bearer';

        return response()->json([
            'status' => true,
            'data' => [
                $user
            ]
        ]);
    }
}
