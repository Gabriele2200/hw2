<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model{
    
    public $timestamps= false;
    
    protected $table= 'users';
    
    
    protected $fillable= [ 'username', 'password','email','name','surname'];

     public function post(){
        return $this->hasMany('App\Models\Post');
    } 






        /* $userid = User::find(Session::get('user_id'));
        $uid = $userid->id;

        $post = array();
        $query = 
        "SELECT users.id AS usersid,
         users.nome AS nome, 
         users.username AS username,
        users.cognome AS cognome, 
        posts.titolo AS titolo, 
        posts.testo AS testo, 
        posts.time AS tempo,
        posts.id AS postsid, 
        EXISTS(SELECT userid FROM likes WHERE postid = posts.id AND userid = $uid) as liked
        FROM posts JOIN users on posts.userid = users.id WHERE testo like '%".$q."%' ORDER BY postsid DESC ";

        $row = DB::select($query);
        for($i=0; $i<count($row); $i++){
        
            $post[] = array(
                "userid" => ($row[$i]->usersid), 
                "nome" => ($row[$i]->nome), 
                "cognome" => ($row[$i]->cognome), 
                "username" => ($row[$i]->username),
            "titolo" => ($row[$i]->titolo),
             "testo" => ($row[$i]->testo), 
             "tempo" => ($this->getTime($row[$i]->tempo)),
              "posts_id" => ($row[$i]->postsid), 
              "liked" => ($row[$i]->liked));

        }

        return $post;
 */
}
