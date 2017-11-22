<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    public function user() {
        return $this->hasMany('App\User', 'timezone', 'id');
    }
}
