<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
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
     * Show the user details page.
     * @param string $username
     *
     */
    public function show(string $username)
    {
        if (!strnatcasecmp($username, Auth::user()->username)) {
            return redirect('account');
        }
        $Auser = Auth::user();
        $avatar = "/storage/usuarios/default_avatar.gif";
        if (!is_null($Auser->avatar)) {
            $avatar = "/storage/usuarios/" . $Auser->id . "/" . $Auser->avatar;
        }
        $user = User::where('username', $username)->firstOrFail();
        session(['usuario' => $user]);
        $followers = $user->followers;
        $followersCount = $followers->count();
        $button = "Seguir";
        foreach ($followers as $key) {
            if ($key->username == $Auser->username) {
                $button = "Dejar de seguir";
            }
        }
        $followings = $user->followings;
        $followingsCount = $followings->count();
        $biografia = $user->biografia;
        $avatar_perfil = "/storage/usuarios/default_avatar.gif";
        if (!is_null($user->avatar)) {
            $avatar_perfil = "/storage/usuarios/" . $user->id . "/" . $user->avatar;
        }

        return view('profile', compact('user', 'followers', 'followings', 'followersCount', 'followingsCount', 'avatar', 'avatar_perfil', 'button', 'biografia'));
    }

    /**
     * Follow the user.
     *
     * @param $profileId
     *
     */
    public function followUser()
    {
        $Auser = Auth::user();
        $user = session('usuario');
        $usuario = User::where('username', $user->username)->firstOrFail();
        $followers = $usuario->followers;
        foreach ($followers as $key) {
            if ($key->username == $Auser->username) {
                @info("yep");
                return response()->json(['error']);
            }
        }
        $user->followers()->attach(auth()->user()->id);
        return response()->json(['success']);
    }

    /**
     * Follow the user.
     *
     * @param $profileId
     *
     */
    public function unFollowUser()
    {
        $user = session('usuario');
        $user->followers()->detach(auth()->user()->id);
        return response()->json(['success']);
    }

}
