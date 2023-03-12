<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StolenCarBase extends Model
{
    use HasFactory;

    protected $table = 'car_stoled_base';

     protected $fillable = [
        
        'name',
        'vin',
        'number',
        'marka',
        'model',
        'color',
        'year',
    ];
}
