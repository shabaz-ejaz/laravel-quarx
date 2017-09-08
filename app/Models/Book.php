<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $table = "books";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		' title',
		'author',
    
];

    public static $rules = [
        // create rules
    ];
    // Book 
}
