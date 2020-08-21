<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded=[];
    

    public function profileImage(){
        $imagePath = '/profile/oNEsNOdc4ieg4v88hEc3mRmeha7r8XVibnp9xcN7.png';
        return ($this->image) ? ($this->image) : ($imagePath);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }
}
