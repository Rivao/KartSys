<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\User;


class ManagerController extends Controller
{
    public function index() 
    {

    	$users = \App\User::all();

    	return view('users', compact('users'));

    }

    public function edit($id) 
    {

    	$edit = true;

    	$user = User::find($id)->first();


    	return view('auth.register', compact('user', 'edit'));

    }

    public function destroy($id) 
    {
    	$user = User::find($id);
        $user->delete();

        $users = \App\User::all();

        return back(); //redirect()->route('view-users', $users);

    }
}
