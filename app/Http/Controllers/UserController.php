<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


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
    public function getAccount()
    {
        return view('account', ['user'=> Auth::user()]);
    }
    public function postSaveAccount(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|max:120'
        ]);

        $user = Auth::user();
        $user->name = $request['name'];
        $user ->update();
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
    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }
}
