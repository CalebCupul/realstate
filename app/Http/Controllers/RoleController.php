<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Role;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function __construct()
    {
        // $this->middleware('permission:roles.index')->only(['index', 'getIndexTable']);
        // $this->middleware('permission:roles.show')->only('show');
        // $this->middleware('permission:roles.create')->only(['create', 'store']);
        // $this->middleware('permission:roles.edit')->only(['edit', 'update']);
        // $this->middleware('permission:roles.destroy')->only('destroy');

        $this->authorizeResource(Role::class, 'role');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.roles.index');
    }

    /**
     * @param Type $var
     */
    public function getIndexTable()
    {
        $this->authorize('viewAny', Role::class);

        return Laratables::recordsOf(Role::class);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::pluck('name', 'id');

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $fields = $request->validated();

        $name        = Arr::only($fields, 'name');
        $permissions = Arr::only($fields, 'permissions');

        $role = Role::updateOrCreate($name);

        $role->syncPermissions($permissions);

        return redirect()->route('roles.edit', $role)->with('toast_success', 'Registro guardado.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return redirect()->route('roles.edit', $role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

        $permissions = Permission::pluck('name', 'id');

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $fields = $request->validated();

        $name        = Arr::only($fields, 'name');
        $permissions = Arr::only($fields, 'permissions');

        $role->update($name);
        $role->syncPermissions($permissions);

        return redirect()->route('roles.edit', $role)->with('toast_success', 'Registro actualizado.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('toast_success', 'Registro eliminado.');
    }
}
