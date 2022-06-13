<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function losts(){
        return $this->hasMany( Lost::class );
    }
}
