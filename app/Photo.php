<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes;

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    protected $dates = ['deleted_at'];
}
