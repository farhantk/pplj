<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class AuthController extends Controller
{
    // SIGN IN
    public function view_signin(){
        return view('Auth/SignIn');
    }

    public function action_signin(Request $request){
        // Validate the request data
        $validated = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ]);

        // Check if the email exists in the database
        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            // If email does not exist, redirect back with email error message
            return back()->with('loginError', 'Email tidak terdaftar!');
        }

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            // Regenerate the session to prevent fixation attacks
            $request->session()->regenerate();

            // Redirect the user to their intended destination
            return redirect()->intended('/');
        }

        // If authentication fails, redirect back with password error message
        return back()->with('loginError', 'Password salah!');
    }

    // SIGN UP
    public function view_signup(){
        return view('Auth/SignUp');
    }

    public function action_signup(Request $request){
        
        $validated = $request->validate([
            'name' => 'required|max:255|min:5',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect('/signin')->with('success', 'Selamat akunmu berhasil dibuat!');
    }

    // SIGN OUT
    public function action_signout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/signin');
    }

    // PROFILE UPDATE
    public function view_profile(){
        return view('Auth/profile', [
            'email' => Auth::user()->email,
            'name' => Auth::user()->name,
            'role' => Auth::user()->role,
            'avatar' => Auth::user()->avatar,
            'isActive' => ''
        ]);
    }
    public function action_edit(Request $request){
        $user = user::findOrFail(Auth::user()->id);
        $validated = $request->validate([
            'name' => 'required|max:255|min:5',
            'avatar1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        // Jika ada file foto yang diupload, simpan file dan update path foto
        if ($request->hasFile('avatar1')) {
            // Hapus foto lama jika ada
            if ($user->avatar !== 'uploads/foto/avatar.jpg') {
                Storage::disk('public')->delete($user->avatar);
            }
            // Simpan file foto baru
            $filePath = $request->file('avatar1')->store('uploads/foto', 'public');
            $validated['avatar'] = $filePath;
        }

        $user->update($validated);

        return redirect('/');
    }
}
