<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lost extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'lost_category_id', 'desc'];

    public function lost_category(){
        return $this->belongsTo( LostCategory::class );
    }

    public function lost_info_details(){
        return $this->hasMany( LostInfoDetail::class );
    }
}
