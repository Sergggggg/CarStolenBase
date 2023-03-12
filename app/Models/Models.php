<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    use HasFactory;

         protected $fillable = [
		        'make_id',
		        'model_id',
		        'model_name',
			];
}
