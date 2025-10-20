<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = 'dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
 
    public function login(Request $request): RedirectResponse
    {   
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            
            if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
            {
                return redirect()->to('dashboard');
            }else{
                return redirect()->route('login')->with('error','Password Are Wrong.');
            }
            
        }
        else{
            return back()->with('error','Email does not exist, Register First.');
        }
        
        
        // if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        // {
        //     if (auth()->user()->type == 'Admin') {
        //         return redirect()->to('/admin');
        //     }
        //     else{
        //         return redirect()->to('/user');
        //     }
        // }else{
        //     return redirect()->route('login')
        //         ->with('error','Email-Address And Password Are Wrong.');
        // }
          
    }  
    
}
