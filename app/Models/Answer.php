<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['level_id','value','answer','selected','status'];

    public function level()
    {
        return $this->hasOne(Level::class, 'id', 'level_id');
    }
}
