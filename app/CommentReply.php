<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //
    protected $fillable = [
        'comment_id',
        'author',
        'email',
        'photo',
        'body',
        'is_active',
    ];
    
    
    public function comment(){
        
        //return $this->hasMany('App\Comment');
        return $this->belongsTo('App\Comment');
    }
}
