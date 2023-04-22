<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        // dd($credentials);
        // dd($request->password);
        $user = User::where('email', $request->email)->first();
        // dd($user);
        // $dBHashedPassword = $user->password;

        // $dBStoredSalt = $user->unique_salt;
        // $requestedPasswordHash = $this->customHash($request->password, $dBStoredSalt);
        // dd($requestedPasswordHash); 
        // if ($requestedPasswordHash == $dBHashedPassword) {
            // $credentials['password'] .= $dBStoredSalt;
        // }
        // dd($credentials);
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
         
        return redirect(route('login'))->with('status', 'User Created Successfully !!');
    }

    public function create(array $data)
    {
        $salt = bin2hex(random_bytes(16)); // 16 bytes of random data

        $password = $data['password'];
        $hashedPassword = $this->customHash($password, $salt);

      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($password),
        'role' => $data['role'],
        'unique_salt' => $salt,
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

    public function customHash($password, $salt) {
        $saltedPassword = $password . $salt;
        $hash = hash_init('sha512');
        hash_update($hash, $saltedPassword);
        $digest = hash_final($hash, true);
      
        $hashResult = 0;
        for ($i = 0; $i < strlen($digest); $i++) {
          $char = ord($digest[$i]);
          $hashResult = (($hashResult << 5) - $hashResult) + $char;
          $hashResult &= 0xffffffff;
        }
      
        for ($i = 0; $i < 10000; $i++) {
          for ($j = 0; $j < strlen($digest); $j++) {
            $char = ord($digest[$j]);
            $hashResult = (($hashResult << 5) - $hashResult) + $char;
            $hashResult &= 0xffffffff;
      
            $hashResult = (($hashResult << 2) | ($hashResult >> 30)) ^ $char;
          }
        }
        
        return $hashResult;
      }
    }
