<?php

namespace App\Http\Controllers;

use App\Enums\EnumRoles;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:users.index')->only(['index', 'getIndexTable']);
        // $this->middleware('permission:users.show')->only('show');
        // $this->middleware('permission:users.create')->only(['create', 'store']);
        // $this->middleware('permission:users.edit')->only(['edit', 'update']);
        // $this->middleware('permission:users.destroy')->only('destroy');

        $this->authorizeResource(User::class, 'user');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * @param Type $var
     */
    public function getIndexTable()
    {

        $this->authorize('viewAny', User::class);

        return Laratables::recordsOf(User::class);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $fields = $request->validated();

        $user = User::create(Arr::except($fields, 'avatar'));
        $user->assignRole(EnumRoles::USER);

        if ($request->hasFile('avatar')) {
            $this->saveFile($request->file('avatar'), 'avatar', $user);
        }

        return redirect()->route('users.index')->with('toast_success', 'Registro guardado.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
        // return redirect()->route('users.edit', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('admin.users.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $fields = $request->validated();

        $password = Arr::pull($fields, 'password');

        $user->update(Arr::except($fields, 'avatar'));

        if ($password) {
            $user->update([
                'password' => $password,
            ]);
        }
        if ($request->hasFile('avatar') && !$this->saveFile($request->file('avatar'), 'avatar', $user)) {
            return redirect()->route('users.edit', $user)->with('toast_error', 'Algo sailo mal. Intente de nuevo!');
        }

        return redirect()->route('users.edit', $user)->with('toast_success', 'Registro actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('toast_success', 'Registro eliminado.');

    }

    public function getProfile(){
                
        $user = Auth::user();
        $loggedUser = Auth::user();

        return redirect()->route('users.show', compact('user', 'loggedUser'));
    }
}
