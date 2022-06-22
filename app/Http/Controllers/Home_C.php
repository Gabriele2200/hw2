<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Post;

use Illuminate\Routing\Controller as BaseController;



class Home_C  extends BaseController{

    public function home(){
        if(!Session :: get('id')){
            return redirect('login');
        }

        $user = User:: find(Session:: get('id'));
        return view('home')-> with('user',$user);


    }



    
    public function ricerca($q){
        if(!Session::get('id')) return [];
        
       /*  $posta=Post::where('title','LIKE',$v)->where('content','LIKE',$v)->orderBy('id','desc')->get();*/
       $post = Post::where('title','LIKE',"%$q%")->orWhere('content','LIKE',"%$q%")->orderBy('id','desc')->get();
       foreach($post as $row){
         $user= User::where('id',$row['Autore'])->first();

         $array[]= array(
                'Post_id' => $row['id'],
                'autore' => $user->username,
                'title' => $row['title'],
                'content' => $row['content'],
                'ricerca'=> $q
            
          );


       }
       return $array; 
    }


    public function ricerca_m1($m){

        $Key=env('Api_Key');

        $curl = curl_init();
        
        curl_setopt_array($curl, [
          CURLOPT_URL => 'http://dataservice.accuweather.com/locations/v1/cities/search'.$Key.'&q='.$m,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ]);
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        echo $response;
    }


    public function ricerca_m2($m){
        
        $Key=env('Api_Key');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://dataservice.accuweather.com/currentconditions/v1/'.$m.''.$Key.'',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            echo($response);



    }





    
}