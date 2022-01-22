@extends('layouts.master')
@section('content')
<div class="section-header mt-n4">
    <h2>Buat Jenis Cuti</h2>
</div>
</header>
<div class="p-2 card shadow mb-4">
    <div class="card-body pl-0">
        <form action="/admin/jenis-cuti" method="post" class="pl-3 pr-1">
            @csrf
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label for="nama" class="form-label">Jenis Cuti</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" autofocus>
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 w-50 ml-2">
                    <label for="jumlah_hari" class="form-label">jumlah Hari</label>
                    <input type="number" class="form-control @error('jumlah_hari') is-invalid @enderror" name="jumlah_hari" value="{{ old('jumlah_hari') }}" placeholder="0">
                    @error('jumlah_hari')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <hr />
            <div class="mb-3">
                <a href="/admin/jenis-cuti" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection