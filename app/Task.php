<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = ['title', 'description', 'user_id', 'created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }




}
