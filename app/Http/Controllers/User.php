<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class User extends Controller
{
    public function index(){
        if(!Session::get('login')){
            return redirect('')->with('alert','You Should Login First');
        }
        else{
            return view('home');
        }
    }

    public function login(){
        return view('auth/login');
    }

    public function loginPost(Request $request){

        $email = $request->email;
        $password = $request->password;

        $data = DB::table('users')->where('email',$email)->first();
        if($data){
            if(Hash::check($password,$data->password)){
                Session::put('name',$data->name);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                return redirect('home');
            }
            else{
                return redirect('')->with('alert','Password or Email Incorrect !');
            }
        }
        else{
            return redirect('')->with('alert','Password or Email Incorrect!');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('')->with('alert','You are logged out');
    }

    public function register(Request $request){
        return view('auth/register');
    }

    public function registerPost(Request $request){
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);
        $data = DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
        ]);
        return redirect('')->with('alert-success','You Are Registered!');
    }
}
