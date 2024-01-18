<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(): View
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $customMessages = [
            'name.required' => 'The Name field is required',
            'email.required' => 'The Email is required for login',
            'email.unique' => 'The Email is taken',
            'password.required' => 'You Have To Set Your Password',
            'password.confirmed' => 'Password is NOT confirmed' 
        ];
        $request->validate([
            'name' => 'required|string|max:64',
            'email' => 'required|email:max:64',
            'email' => 'required|email:max:64|unique:users',
            'password' => 'required|min:8|confirmed'
        ],$customMessages);

        $date = $request->dob;
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'dob' => $date,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('index')
        ->with('msg','You have successfully registered & logged in!');
        // return redirect()->route('register')->with('msg', 'You\'ve logged in!');
    }

    public function login(): View
    {
        return view('auth.login');
    }    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index')
            ->with('msg','You have logged out successfully!');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('index')
                ->with('msg','You have successfully logged in!');
        }else{
            return redirect()->route('login')
                ->with('msg','Your provided credentials do not match our records');
        }
    }

    public function profile(): View
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $profile = ['user'=>$user];
        return view('auth.profile',$profile);
    }

    public function postProfile(Request $request)
    {
        $customMessages = [
            'name.required' => 'The Name field is required',
            'name.max' => 'name field max 64 characters'
        ];
        $request->validate([
            'name' => 'required|string|max:64',
        ],$customMessages);
        
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        if(!empty($user)){
            $user->name = $request->name;
            if($user->update()){
                return redirect()->route('profile')->with('msg', 'Profile updated');
            }else{
                echo 'error';
            };
    
        }else{
            echo 'user not found';
        }

    }
}


#EOF