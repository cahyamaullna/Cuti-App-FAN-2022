<?php

namespace App\Models;

use App\Models\Cuti;
use Illuminate\Database\Eloquent\Model;

class JenisCuti extends Model
{
    public $table = 'jeniscuti';
    protected $guarded = ['id'];

    public function cuti()
    {
        return $this->belongsTo(Cuti::class);
    }
}
