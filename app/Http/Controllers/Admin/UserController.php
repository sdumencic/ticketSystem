<?php

namespace TicketSystem\Http\Controllers\Admin;

use Illuminate\Http\Request;
use TicketSystem\Http\Controllers\Controller;
use TicketSystem\User;
use TicketSystem\Role;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$roles = Role::orderBy('name', 'desc')->paginate(10);
        return view('admin.index')->with('users', User::all());
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('error', 'You are not allowed to edit yourself.');
        }
        return view('admin.edit')->with(['user' => User::find($id), 'roles' => Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->id == $id) {
            return redirect()->route('admin.index')->with('error', 'You are not allowed to edit yourself.');
        }

        $user = User::find($id);
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index')->with('success', 'User updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('error', 'You are not allowed to delete yourself.');
        }
        User::destroy($id);
        return redirect()->route('admin.users.index')->with('success', 'User has been deleted');
    }
}
