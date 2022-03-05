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
                    <select class="form-control" name="posisi" id="posisi" onchange="updateAtasan()">
                        <option value="">-- Pilih Posisi --</option>
                        <option value="karyawan">Karyawan</option>
                        <option value="atasan">Atasan</option>
                        <option value="hrd">HRD</option>
                        <option value="direktur">Direktur</option>
                    </select>
                </div>
                <div class="mb-3 w-50 ml-2 d-none" id="atasan_id">
                    <label for="atasan_id" class="form-label">Atasan</label>
                    <select class="form-control" name="atasan_id" id="atasan_id">
                        <option value="">-- Pilih Atasan --</option>
                        @foreach($get_atasan as $user)
                        <option value="{{ $user->id }}">{{ $user->nama }}</option>
                        @endforeach
                    </select>
                    @error('atasan_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
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
@section('js')
<script>
    function updateAtasan() {
        let posisi = $('#posisi').val()
        if (posisi == 'karyawan' || posisi == 'atasan') {
            $('#atasan_id').removeClass('d-none')
        } else {
            $('#atasan_id').addClass('d-none')
        }
    }
</script>
@endsection