<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
    use HasFactory;


    public function band()
    {
        

        return $this->hasOne(Band::class,'r.band_id','id');
    }
}
