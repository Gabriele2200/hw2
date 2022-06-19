<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Post extends Model{
    
    public $timestamps= false;
    
    protected $table= 'post';
    
    
    protected $fillable= [ 'Autore', 'title','content'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
