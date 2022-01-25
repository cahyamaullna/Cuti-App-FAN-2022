<?php

namespace App\Models;

use App\Models\User;
use App\Models\JenisCuti;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'cuti';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jeniscuti()
    {
        return $this->belongsTo(JenisCuti::class);
    }
}
