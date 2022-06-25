<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['name','slug','status'];

    public function operators()
    {
        return $this->belongsToMany(Operator::class, 'level_operators', 'level_id', 'operator_id')->withTimestamps();
    }

    // public function answer()
    // {
    //     return $this->hasOne(Answer::class, 'level_id', 'id');
    // }
}
