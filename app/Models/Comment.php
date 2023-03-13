<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tweet_id',
        'user_id',
        'text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function commentStore(Int $user_id, Array $data)
    {
        $this->user_id = $user_id;
        $this->tweet_id = $data['tweet_id'];
        $this->text = $data['text'];
        $this->save();

        return;
    }

}
