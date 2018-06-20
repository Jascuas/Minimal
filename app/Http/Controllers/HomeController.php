<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $avatar = "/storage/usuarios/default_avatar.gif";
        if (!is_null($user->avatar)) {
            $avatar = "/storage/usuarios/" . $user->id . "/" . $user->avatar;
        }
        return view('home',compact('avatar'));
    }
}
