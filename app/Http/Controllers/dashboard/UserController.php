<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'rol.admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(User::find(2)->tags()->sync([1, 2, 3, 4]));
        $users = User::with('rol')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('dashboard.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('dashboard.user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserPost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPost $request)
    {
        User::create([
            'name' => $request['name'],
            'rol_id' => 2, // rol de admin
            'surname' => $request['surname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return back()
            ->with('status', 'Usuario creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserPost  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPut $request, User $user)
    {
        $user->update([
            'name' => $user['name'],
            'surname' => $user['surname'],
            'email' => $user['email'],
        ]);
        return back()
            ->with('status', 'Usuario actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()
            ->with('status', 'Usuario borrado correctamente!');
    }
}
