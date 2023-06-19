<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
  
class AuthController extends Controller
{
    public function home(): View
    {
        return view('welcome');
    }  

    public function authenticate(): View
    {   
        if(Auth::check()){
            return view('dashboard');
        }

        $user = User::first();
        if(is_null($user)) {
            session()->flash('failure', 'First time use detected. Please initialize your account.');
            return view('auth.registration');
        }else {
            return view('auth.login');
        }
    }  

    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withFailure('You have Successfully Logged In!');
        }
  
        return redirect()->route('authenticate')->withSuccess('Invalid Credentials');
    }

    public function postRegistration(Request $request): RedirectResponse
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("authenticate")->withFailure('Initialization Successful! Please Log in.');
    }

    public function dashboard(): View
    {
        if(Auth::check()){
            session()->forget('success');
            return view('dashboard');
        }

        $user = User::first();
        if(is_null($user)) {
            session()->flash('failure', 'First time use detected. Please initialize your account first by pressing start.');
            return view('welcome');
        }else {            
            session()->flash('success', 'You do not have access for this page.');
            return view('auth.login');
        }
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
  
        return redirect()->route('home')->withFailure('You have successfully logged out.');
    }
}