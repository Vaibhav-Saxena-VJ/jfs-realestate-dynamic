<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::get();
        return view('admin.role-permission.role.index',[
            'roles' => $roles
        ]);

    }

    public function create(){
        return view('admin.role-permission.role.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name'
            ]
            ]);
            Role :: create([
                'name' => $request->name
            ]);
            return redirect('admin/roles')->with('status','Role created successfully');
    }
    
    public function edit(Role $role){
        return view('admin.role-permission.role.edit',[
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role){
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name'
            ]
            ]);
            $role->update([
                'name' => $request->name
            ]);
            return redirect('admin/roles')->with('status','Role updated successfully');
    }

    public function  destroy($roleId){
        $role = Role::find($roleId);
        $role->delete(); 
        return redirect('admin/roles')->with('status','Role deleted successfully');     
    }
    public function addPermissionToRole($roleId){
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
                                ->where('role_has_permissions.role_id', $role->id)
                                ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                                ->all();
        return view ('admin.role-permission.role.add-permissions',[
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions
        ]);
    }
    public function givePermissionToRole(Request $request, $roleId){
        $request->validate([
            'permission' => 'required|array',
        ]);
        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permission);
        return redirect()->back()->with('status', 'Permissions added to role');
    }
}
