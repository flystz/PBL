<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sentimen extends Model
{
    use HasFactory;
    protected $table = 'sentimen';

    protected $fillable = [
        'review',
        'prediksi',
    ];
}
