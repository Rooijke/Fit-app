<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;

    protected $table = 'pieces';

    protected $fillable = [
        'brand_name',
        'description',
        'type',
        'name',
        'image',
    ];
}
