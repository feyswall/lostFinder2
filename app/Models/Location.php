<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    /**
     * Get all of the contacts for the Location
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function regions(){
        return $this->hasMany( Region::class );
    }
}
