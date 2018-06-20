<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
    public function getLogout()
    {
        Auth::logout();
        return redirect(\URL::previous());
    }
    public function getBorrar()
    {
        $user = Auth::user();
        Auth::logout();
        if ($user->delete()) {
            return redirect(\URL::previous());
        }

    }
    public function getAccount()
    {
        $user = Auth::user();
        $followers = $user->followers;
        $followersCount = $followers->count();
        $followings = $user->followings;
        $followingsCount = $followings->count();
        $biografia = $user->biografia;
        $avatar = "/storage/usuarios/default_avatar.gif";
        if (!is_null($user->avatar)) {
            $avatar = "/storage/usuarios/" . $user->id . "/" . $user->avatar;
        }

        return view('account', compact('user', 'followers', 'followings', 'followersCount', 'followingsCount', 'avatar', 'biografia'));
    }

    public function changeAvatar(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:120',
        ]);

        $user = Auth::user();
        $user->name = $request['name'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['name'] . '-' . $user->id . '.jpg';
        // $old_filename = $old_name . '-' . $user->id . '.jpg';
        // $update = false;
        // if (Storage::disk('local')->has($old_filename)) {
        //     $old_file = Storage::disk('local')->get($old_filename);
        //     Storage::disk('local')->put($filename, $old_file);
        //     $update = true;
        // }
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        // if ($update && $old_filename !== $filename) {
        //     Storage::delete($old_filename);
        // }
        return redirect()->route('account');
    }
    public function changeUserName()
    {
        $Datos = $_POST;
        $messages = array(
            'username.required' => 'El nombre de usuario es requerido.',
            'username.max' => 'El nombre de usuario no puede superar 10 caracteres.',
            'username.string' => 'El nombre de usuario no puede contener caracteres especiales.',
            'username.unique' => 'El nombre de usuario ya esta siendo usado en nuestra base de datos.',
        );
        $rules = array(
            'username' => 'required|string|max:10|unique:users',
        );
        $validatedData = Validator::make($Datos, $rules, $messages);
        if ($validatedData->fails()) {
            return response()->json(['errors' => $validatedData->errors()]);
        } else {
            $user = Auth::user();
            $user->username = $Datos['username'];
            $user->update();
            return response()->json(['success', $Datos['username']]);
        }
    }
    public function postBiografia()
    {
        $Datos = $_POST;
        $messages = array(
            'biografia.required' => 'La biografia no puede estar en blanco.',
            'biografia.max' => 'La biografia no puede superar 300 caracteres.',
        );
        $rules = array(
            'biografia' => 'required|max:300',
        );
        $validatedData = Validator::make($Datos, $rules, $messages);
        if ($validatedData->fails()) {
            return response()->json(['errors' => $validatedData->errors()]);
        } else {
            $user = Auth::user();
            $user->biografia = $Datos['biografia'];
            $user->update();
            return response()->json(['success', $Datos['biografia']]);
        }
    }
    public function buscarUser()
    {
        $Datos = $_POST;
        $username = $_POST["username"];
        $messages = array(
            'username.required' => 'El nombre de usuario es requerido.',
        );
        $rules = array(
            'username' => 'required',
        );
        $validatedData = Validator::make($Datos, $rules, $messages);
        if ($validatedData->fails()) {
            return response()->json(['errors' => $validatedData->errors()]);
        } else {
            $user = User::where('username', $username)->first();
            if (!$user) {
                return response()->json(['error' => 'No hay usuarios con ese nombre']);
            } else {
                $avatar = "/storage/usuarios/default_avatar.gif";
                if (!is_null($user->avatar)) {
                    $avatar = "/storage/usuarios/" . $user->id . "/" . $user->avatar;
                }
                $url = url("/perfil/" . $username);

          $usuario = '<div class="mdb-feed"><a href="'.$url.'"><div class="news"><div class="label"><img src="'.$avatar.'" class="rounded-circle z-depth-1-half"></div>
          <div class="excerpt"><div class="brief"><p class="name" >'.$username.'</p></div></div></div></a></div>';
                return response()->json(['success', $usuario]);
            }

        }
    }
    // public function postSaveAccount(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required|max:120',
    //     ]);

    //     $user = Auth::user();
    //     $user->name = $request['name'];
    //     $user->update();
    //     $file = $request->file('image');
    //     $filename = $request['name'] . '-' . $user->id . '.jpg';
    //     // $old_filename = $old_name . '-' . $user->id . '.jpg';
    //     // $update = false;
    //     // if (Storage::disk('local')->has($old_filename)) {
    //     //     $old_file = Storage::disk('local')->get($old_filename);
    //     //     Storage::disk('local')->put($filename, $old_file);
    //     //     $update = true;
    //     // }
    //     if ($file) {
    //         Storage::disk('local')->put($filename, File::get($file));
    //     }
    //     // if ($update && $old_filename !== $filename) {
    //     //     Storage::delete($old_filename);
    //     // }
    //     return redirect()->route('account');
    // }
}
