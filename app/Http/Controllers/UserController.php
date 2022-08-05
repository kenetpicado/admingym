<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'username' => ['required', Rule::unique('users')->ignore($user->id)]
        ]);

        $user->update($request->all());
        return redirect()->route('index')->with('info', 'Perfil actualizado correctamente');
    }

    public function password(Request $request, $user_id)
    {
        $request->validate([
            'password' => 'required|min:6|alpha_dash|confirmed',
        ]);

        User::find($user_id)->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('index')->with('info', 'Perfil actualizado correctamente');
    }
}
