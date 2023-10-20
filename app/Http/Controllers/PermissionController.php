<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignPermissionToRoleRequest;
use App\Http\Requests\StorePermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Permission::class, 'permission');
    }

    public function index()
    {
        $this->response(Permission::all());
    }

    public function store(StorePermissionRequest $request)
    {
        if (Permission::query()->where('name', $request->name)->exists()) {
            return $this->error('Permission already exists');
        }

        $permission = Permission::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        return $this->success('Permission created successfully', $permission);
    }

    public function assign(AssignPermissionToRoleRequest $request)
    {

        $permission = Permission::find($request->permission_id);
        $role = Role::findOrFail($request->role_id);

        if ($role->hasPermissionTo($permission->name)) {
            return $this->error('Permission already assigned to role');
        }

        $role->givePermissionTo($permission->name);

        return $this->success('Permission assigned successfully');
    }
}
