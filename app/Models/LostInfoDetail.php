<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostInfoDetail extends Model
{
    use HasFactory;

    protected $fillable = ['lost_info_type', 'lost_info_item', 'lost_id'];

    public function lost(){
        return $this->belongsTo( Lost::class );
    }
}
