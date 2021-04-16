<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    public function messages(){
        return $this->hasMany('App\Models\ChatMessage');
    }
}
