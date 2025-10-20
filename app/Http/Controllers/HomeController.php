<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class HomeController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        return view('home');
    }
    public function user_dashboard(){
        return view('user_dashboard');
    }
    public function admin_dashboard(){
        return view('admin_dashboard');
    }
    public function dashboard(){
        if(Auth::user()->type=='Admin'){
            return view('admin_dashboard');
        }
        else{
            return view('user_dashboard');
        }
    }
    
}
