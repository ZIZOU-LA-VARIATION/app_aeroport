<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Admin extends Model
{
    public $timestamps = false;


    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
