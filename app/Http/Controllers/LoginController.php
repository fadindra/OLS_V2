<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }  
      
    public function customLogin(Request $request): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
            ->withSuccess('Signed in');
        }
  
        // return redirect("login")->withSuccess('Login details are not valid');
        return redirect("login")->with('status', 'Login details are not valid !!');
    }

    public function registration()
    {
        return view('login.register');
    }

    public function profile()
    {
        $user = User::query()
        ->first();
        return view('profile', ['profile' => $user]);
    }
      
    public function customRegistration(Request $request): RedirectResponse
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' =>'required',
        ]);
           
        $data = $request->all();
        // dd($data);
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role' => $data['role']
      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('index');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Auth::logout();
  
        return Redirect('login');
    }
}
