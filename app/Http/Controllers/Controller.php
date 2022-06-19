<?php

namespace App\Http\Controllers;
use Session;
use App\Models\User;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function register_form()
    {
        if(Session::get ('id')) return redirect('home');
        $error= Session::get('error');
        Session::forget('error');
        return view('signup')->with('error',$error);
    }
    public function register(){
        if(Session::get ('id')) return redirect('home');
        if(strlen(request('name'))==0 ||strlen(request('surname'))==0 ||strlen(request('username'))==0 
        ||strlen(request('password'))==0 ||strlen(request('email'))==0 ){
            Session::put('error', 'campi_vuoti');
            return redirect('signup')->withInput();
        }
        else if (User:: where('username', request('username'))->first()){
            Session::put('error', 'username_existing');
            return redirect('signup')->withInput();
        }
        else if (!preg_match('/^[a-zA-Z0-9_]{1,15}$/', request('username'))){
            Session::put('error', 'user_non_valido');
            return redirect('signup')->withInput();
        }
        else if (strlen(request('password')) < 5){
            Session::put('error', 'pass_non_valida');
            return redirect('signup')->withInput();
        }
        else if (!filter_var(request('email') , FILTER_VALIDATE_EMAIL)){
            Session::put('error', 'email_non_valia');
            return redirect('signup')->withInput();
        }
        else if (User:: where('email', request('email'))->first()){
            Session::put('error', 'email_existing');
            return redirect('signup')->withInput();
        }

        $user= new User;
        $user->name=request('name');
        $user->surname=request('surname');
        $user->username=request('username');
        $user->password=password_hash(request('password'), PASSWORD_BCRYPT);
        $user->email=request('email');
        $user->save();

        Session::put('id',$user->id);
        return redirect('home');

    }
    public function login_form()
    {
        if(Session::get ('id')) return redirect('home');
        $error= Session::get('error');
        Session::forget('error');
        return view('login')->with('error',$error);
    }

    public function login(){
        if(Session::get ('id')) return redirect('home');
        if(strlen(request('username'))==0 ||strlen(request('password'))==0){
            Session::put ('error', 'campi_vuoti');
            return redirect('login')->withInput();
        }
        $user= User::where('username',request('username'))->first();
        if(!$user || !password_verify(request('password'), $user->password)){
            Session::put ('error','errate_cred');
            return redirect('login')->withInput();
        }
        
        Session::put('id' , $user->id);
        return redirect('home');


    }


   

    public function checkUsername($query){
        $exist = User::where('username', $query)-> exists();
        return['exists' => $exist];
    }

    public function checkEmail($query){
        $exist = User::where('email', $query)-> exists();
        return['exists' => $exist];
    }

    public function logout(){
        Session:: flush();
        return redirect('login');
    }



}
