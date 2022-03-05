<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenguranganCuti extends Model
{
    use HasFactory;
    protected $table = 'pengurangan_cuti';
    protected $guarded = [];
}
