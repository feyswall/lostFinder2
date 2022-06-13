<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    use HasFactory;

    public function region(){
        
        return $this->belongsTo( Region::class );
    }

    public function contacts()
    {
        return $this->hasMany(Contacts::class);
    }
}
