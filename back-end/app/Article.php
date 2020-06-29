<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'body', 'title', 'excerpt'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
