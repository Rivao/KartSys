<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group = Auth::user()->group_id;
        return view('home', compact('group'));
    }

    public function language($lang)
    {
        if($lang == 'en' || $lang == 'lv') {
            $user = Auth::user();
            $user->lang = $lang;
            $user->save();
        }

        return back();
    }
}
