<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $table = "tags";

    public $primaryKey = "id";

    public $timestamps = true;

    public $fillable = [
		'id',
		'name',
		'author',
    
];

    public static $rules = [
        // create rules
    ];
    
	public function posts() {
		return $this->belongsToMany(\App\Models\Post::class);
	}
	
}
