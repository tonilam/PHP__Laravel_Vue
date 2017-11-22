<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    /**
     * Define relationship with the User model
     */
    public function user() {
        return $this->hasMany('App\User', 'timezone', 'id');
    }
}
