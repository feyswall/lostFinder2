<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public function location(){
        return $this->belongsTo( Location::class );
    }

    public function searches(){
        return $this->hasMany( Search::class );
    }
}
