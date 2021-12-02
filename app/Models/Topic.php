<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function subscribers(){
       return $this->belongsToMany(Subscriber::class);
    }
}
