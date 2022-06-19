<?php

namespace App\Http\Controllers;
use Session;
use App\Models\User;
use App\Models\Post;
use Illuminate\Routing\Controller as BaseController;

class Create_Controller extends BaseController{

    public function index(){
        if(!Session :: get('id')){
            return redirect('login');
        }

        $error = Session:: get('error');
        Session::forget('error');
        return view('create')-> with('error',$error);


    }

    public function create_p(){
        if(!Session::get('id')) return redirect('home');
        if(!empty(request('title')) && !empty(request('content'))){
            
            $post = new Post;
            $post->title = request('title');
            $post->content = request('content');
            $user = User::find(Session::get('id'));
            $A = $user->id;
            $post->Autore = $A;
            $post->save();

            if($post){
                Session::put('error','postato');
                return redirect('create');
            }
            

        }
        else{
            Session::put('error','n_postato');
            return redirect('create')->withInput();
        }
        
    }

    public function post(){
        if(!Session::get('id')) return [];
        $post_s = Post::orderBy('id','desc')->get();
        foreach($post_s as $row){
            $user=User::where('id',$row['Autore'])->first();

            $array[] = array(
            "Post_id" => $row["id"],
            "autore" => $user->username,
            "title" => $row["title"],
            "content" => $row["content"]);
        
        }
        
        return $array;
        

    }
    



}