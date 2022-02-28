<?php

namespace App\Models;

use App\Models\User;
use App\Models\JenisCuti;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'cuti';
    protected $guarded = ['id'];
    protected $appends = ['hasil', 'detail', 'approval'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jeniscuti()
    {
        return $this->belongsTo(JenisCuti::class);
    }

    // tabel data cuti
    public function getHasilAttribute()
    {
        if ($this->user->posisi == 'karyawan') {
            if ($this->atasan == 1 || $this->hrd == 1 || $this->direktur == 1) {
                $hasil = '<div class="badge badge-danger">Ditolak</div>';
                return $hasil;
            } elseif ($this->atasan == 2 && $this->hrd == 2 && $this->direktur == 2) {
                $hasil = '<div class="badge badge-success">Disetujui</div>';
                return $hasil;
            } else {
                $hasil = '<div class="badge badge-warning">Diproses</div>';
                return $hasil;
            }
        } elseif ($this->user->posisi == 'atasan') {
            if ($this->hrd == 1 || $this->direktur == 1) {
                $hasil = '<div class="badge badge-danger">Ditolak</div>';
                return $hasil;
            } elseif ($this->hrd == 2 && $this->direktur == 2) {
                $hasil = '<div class="badge badge-success">Disetujui</div>';
                return $hasil;
            } else {
                $hasil = '<div class="badge badge-warning">Diproses</div>';
                return $hasil;
            }
        } elseif (auth()->user->posisi == 'hrd') {
            if ($this->direktur == 1) {
                $hasil = '<div class="badge badge-danger">Ditolak</div>';
                return $hasil;
            } elseif ($this->direktur == 2) {
                $hasil = '<div class="badge badge-success">Disetujui</div>';
                return $hasil;
            } else {
                $hasil = '<div class="badge badge-warning">Diproses</div>';
                return $hasil;
            }
        }
    }

    // detail approval
    public function getDetailAttribute()
    {
        if (auth()->user()->posisi == 'atasan') {
            if ($this->atasan == 1) {
                $detail = '<div class="badge badge-danger">Ditolak</div>';
                return $detail;
            } elseif ($this->atasan == 2) {
                $detail = '<div class="badge badge-success">Disetujui</div>';
                return $detail;
            } elseif ($this->atasan == 1 || $this->hrd == 1 || $this->direktur == 1) {
                $detail = '<div class="badge badge-danger">Ditolak</div>';
                return $detail;
            } else {
                $detail = '';
                return $detail;
            }
        } elseif (auth()->user()->posisi == 'hrd') {
            if ($this->hrd == 1) {
                $detail = '<div class="badge badge-danger">Ditolak</div>';
                return $detail;
            } elseif ($this->hrd == 2) {
                $detail = '<div class="badge badge-success">Disetujui</div>';
                return $detail;
            } elseif ($this->atasan == 1 || $this->hrd == 1 || $this->direktur == 1) {
                $detail = '<div class="badge badge-danger">Ditolak</div>';
                return $detail;
            } else {
                $detail = '';
                return $detail;
            }
        } elseif (auth()->user()->posisi == 'direktur') {
            if ($this->direktur == 1) {
                $detail = '<div class="badge badge-danger">Ditolak</div>';
                return $detail;
            } elseif ($this->direktur == 2) {
                $detail = '<div class="badge badge-success">Disetujui</div>';
                return $detail;
            } elseif ($this->atasan == 1 || $this->hrd == 1 || $this->direktur == 1) {
                $detail = '<div class="badge badge-danger">Ditolak</div>';
                return $detail;
            } else {
                $detail = '';
                return $detail;
            }
        }
    }

    // button edit approval
    public function getApprovalAttribute()
    {
        if (auth()->user()->posisi == 'atasan') {
            if ($this->atasan == 1 || $this->hrd == 1 || $this->direktur == 1) {
                $approval = '<div class="badge badge-info mt-2">Sudah Ditolak</div>';
                return $approval;
            } else {
                $approval = '<button type="submit" class="btn btn-danger mr-1" value="1" name="atasan">Tolak</button><button type="submit" class="btn btn-success" value="2" name="atasan">Setuju</button>';
                return $approval;
            }
        } elseif (auth()->user()->posisi == 'hrd') {
            if ($this->atasan == 1 || $this->hrd == 1 || $this->direktur == 1) {
                $approval = '<div class="badge badge-info mt-2">Sudah Ditolak</div>';
                return $approval;
            } else {
                $approval = '<button type="submit" class="btn btn-danger mr-1" value="1" name="hrd">Tolak</button><button type="submit" class="btn btn-success" value="2" name="hrd">Setuju</button>';
                return $approval;
            }
        } elseif (auth()->user()->posisi == 'direktur') {
            if ($this->atasan == 1 || $this->hrd == 1 || $this->direktur == 1) {
                $approval = '<div class="badge badge-info mt-2">Sudah Ditolak</div>';
                return $approval;
            } else {
                $approval = '<button type="submit" class="btn btn-danger mr-1" value="1" name="direktur">Tolak</button><button type="submit" class="btn btn-success" value="2" name="direktur">Setuju</button>';
                return $approval;
            }
        }
    }
}
