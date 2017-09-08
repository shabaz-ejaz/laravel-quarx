<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toy extends Model
{
    public $table = "toys";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		'title',
		'author',
    
];

    public static $rules = [
        // create rules
    ];
    // Toy 
}
