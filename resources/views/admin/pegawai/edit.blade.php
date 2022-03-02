@extends('layouts.master')
@section('content')
<div class="section-header mt-n4">
    <h2>Ubah Akun</h2>
</div>
</header>
<div class="p-2 card shadow mb-4">
    <div class="card-body pl-0">
        <form action="/admin/data-pegawai/{{ $data->id }}" method="post" class="pl-3 pr-1">
            @method('put')
            @csrf
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" value="{{ $data->nama }}" readonly>
                </div>
                <div class="mb-3 w-50 ml-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" value="{{ $data->email }}" readonly>
                </div>
            </div>
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label for="npp" class="form-label">NPP</label>
                    <input type="text" class="form-control" value="{{ $data->npp }}" readonly>
                </div>
                <div class="mb-3 w-50 ml-2">
                    <label for="posisi" class="form-label">Posisi</label>
                    <select class="form-control" name="posisi">
                        <option value="karyawan" {{ $data->posisi == 'karyawan' ? 'selected' : ''}}>Karyawan</option>
                        <option value="atasan" {{ $data->posisi == 'atasan' ? 'selected' : ''}}>Atasan</option>
                        <option value="hrd" {{ $data->posisi == 'hrd' ? 'selected' : ''}}>HRD</option>
                        <option value="direktur" {{ $data->posisi == 'direktur' ? 'selected' : ''}}>Direktur</option>
                    </select>
                </div>
            </div>
            <hr />
            <div class="mb-3">
                <a href="/admin/data-pegawai" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection