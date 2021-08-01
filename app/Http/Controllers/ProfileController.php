<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        // return "This is Profile";
        return view('user-profile.profile');
    }

    public function editPhoto(){
        // return "Hello edit";
        return view('user-profile.edit-photo');
    }

    public function changePhoto(Request $request){
        $request->validate([
            // 'photo' => 'mimes:jpeg,png',
            // 'photo' => 'image|size:1024', // 1 MB
            // 'photo' => 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            "photo"=> "required|mimetypes:image/jpeg,image/png|dimensions:ratio=1/1|file|max:2500"
        ]);
        $dir="public/profile/";

       if(isset(Auth::user()->photo)){
        Storage::delete($dir.Auth::user()->photo);
       }
        $newName = uniqid()."_photo.".$request->file("photo")->getClientOriginalExtension();
        $request->file("photo")->storeAs($dir,$newName);

        $user = User::find(Auth::id());
        $user->photo = $newName;
        $user->update();

        return redirect()->route('profile.edit.photo');
    }
    public function editPassword(){
        return view('user-profile.edit-password');
    }

    public function changePassword(Request $request){
       // return $request;
        $request->validate([

            "current_password"=>['required',new MatchOldPassword()],
            "new_password"=>['required','min:8'],
            "new_confirm_password"=> ['same:new_password'],

        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        Auth::logout();
        return redirect()->route('login');

    }

    public function editNameEmail(){
        return view('user-profile.edit-name-email');
    }

    public function changeName(Request $request){
        $request->validate([
            'name'=>"required|min:5|max:50",
        ]);
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->update();
        return redirect()->route('profile.edit.name.email');

    }
    public function changeEmail(Request $request){
        $request->validate([
            'email' => "required|min:3|max:50",
        ]);
        $user = User::find(Auth::id());
        $user->email = $request->email;
        $user->update();
        return redirect()->route("profile.edit.name.email");
    }
}
