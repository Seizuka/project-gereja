<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuota extends Model
{
    protected $primaryKey = 'id';
	protected $table = 'kuota';

    protected $fillable = [
        'kuota', 
    ];
}
