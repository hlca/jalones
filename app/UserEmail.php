<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEmail extends Model
{
   protected $fillable = [
        'user_id', 'email', 'organization_id'
    ];
}
