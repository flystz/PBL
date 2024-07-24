<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataJarak extends Model
{
    use HasFactory;

    protected $table = 'meja';
    protected $fillable = ['indikator'];
}