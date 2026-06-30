<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable =[ 'title','content','user_id'];

    public function auther():BelongsTo // many to one
    {
        return $this->belongsTo(User::class, 'user_id');  
    }
}
