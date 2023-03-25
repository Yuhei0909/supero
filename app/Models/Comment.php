<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'tweet_id',
        'user_id',
        'text',
        'parent_id',
    ];

    public function tweet()
    {
        return $this->belongsTo(Tweet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}