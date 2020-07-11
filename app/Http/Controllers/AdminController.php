<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user_login = Auth::user()->username;
        $user = User::Where('username',$user_login)->first();

        return view('admin.profile',[
            'title' => 'My Profile',
            'user' => $user
        ]);
    }

    public function edit()
    {
        $user_login = Auth::user()->username;
        $user = User::Where('username',$user_login)->first();

        return view('admin.edit_profile',[
            'title' => 'Edit Profile',
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $user_login = Auth::user()->username;
        $user = User::Where('username',$user_login)->first();
        
        $request->validate([
            'name' => 'required|min:3',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if($request->file('image')){
            if($user->image !== 'images/profiles/default.jpg'){
                \Storage::delete($user->image);
            }
            $image = $request->file('image')->store('images/profiles');
        }else{
            $image = $user->image;
        }

        User::where('username', $user->username)->update([
            'name' => $request->name,
            'image' => $image
        ]);

        return redirect()->route('myprofile')->with('success','Profile Berhasil di Update.');
    }

    public function changePassword()
    {
        return view('admin.change_password',[
            'title' => 'Ubah Password'
        ]);
    }

    public function updatePassword(Request $request)
    {
        $user_login = Auth::user()->username;
        $user = User::Where('username',$user_login)->first();

        if(!Hash::check($request->current_password, $user->password)){
            return back()->with('error', 'Password salah');
        }
        if(Hash::check($request->new_password, $user->password)){
            return back()->with('error', 'Password baru tidak boleh sama');
        }
        if($request->new_password !== $request->password_confirmation){
            return back()->with('error', 'Konfirmasi password salah');
        }

        

        User::where('username', $user->username)->update([
            'password' => bcrypt($request->new_password)
        ]);

        return redirect()->route('myprofile')->with('success', 'Password berhasil di update.');
    }

}
