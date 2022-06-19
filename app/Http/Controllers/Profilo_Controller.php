<?php

namespace App\Http\Controllers;
use Session;
use App\Models\User;
use App\Models\Post;
use Illuminate\Routing\Controller as BaseController;

class Profilo_Controller extends BaseController{

    public function index(){
        if(!Session :: get('id')){
            return redirect('login');
        }

        $user = User:: find(Session:: get('id'));
        return view('profilo')-> with('user',$user);


    }

    public function delete_post($id){
        $deletePost= Post::where('id',$id)->delete();
    }

    public function my_post(){
        if(!Session::get('id')) return [];

        $u_query= User::where('id',Session::get('id'))->first();
        $userID = $u_query['id'];

        $post_s = Post::where('Autore', $userID)->orderBy('id','desc')->get();
        
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




