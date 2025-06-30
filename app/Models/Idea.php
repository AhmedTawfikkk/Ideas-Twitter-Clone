<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class idea extends Model
{
    protected $fillable=[
        'content',
        'user_id'
    ];

    protected $with=['user:id,name,image','comments.user:id,name,image'];
    protected $withCount=['likes'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->belongsToMany(User::class,'idea_like')->withTimestamps();
    }

    public function scopeSearch($query, $search='')  // reuse it inside dashboard and feed controller
    {
        $query->where('content','like','%'.$search.'%');   // i will pass the search key as a parameter here as we dont have the access to request() inside the model
    }

   
}
