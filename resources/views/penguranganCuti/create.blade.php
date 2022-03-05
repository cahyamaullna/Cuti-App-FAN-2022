@extends('layouts.master')
@section('content')
<div class="p-2 card shadow mb-4">
    <div class="card-header pl-3 mb-n2">
        <h3>Tambah Pengurangan Cuti</h3>
    </div>
    <div class="card-body pl-0">
        <form action="/pengurangan-cuti" method="post" class="pl-3 pr-1">
            @csrf
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label for="nama" class="form-label">Nama</label>
                    <select class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" onchange="updateSisaCuti()">
                        <option value="">-- Pilih Nama --</option>
                        @foreach($users as $user)
                        @if(old('nama') == $user->nama)
                        <option value="{{ $user->nama }}" selected>{{ $user->nama }}</option>
                        @else
                        <option value="{{ $user->nama }}">{{ $user->nama }}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 w-50 ml-2">
                    <label for="sisa_cuti" class="form-label">Sisa Cuti</label>
                    <input type="text" class="form-control @error('sisa_cuti') is-invalid @enderror" name="sisa_cuti" value="{{ old('sisa_cuti') }}" id="sisa_cuti" readonly>
                    @error('sisa_cuti')
                    <div class="invalid-feedback">
                        Sisa cuti must be at least 0.
                    </div>
                    @enderror
                </div>
            </div>
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label for="pengurangan_cuti" class="form-label">Pengurangan hari</label>
                    <input type="number" class="form-control @error('pengurangan_cuti') is-invalid @enderror" name="pengurangan_cuti" value="{{ old('pengurangan_cuti') }}">
                    @error('pengurangan_cuti')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 w-50 ml-2">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') }}">
                    <input type="hidden" class="form-control" name="id" id="id">
                    @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <hr />
            <div class="mb-3">
                <a href="/pengurangan-cuti" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    function updateSisaCuti() {
        let nama = $('#nama').val();
        if (nama == '') {
            $('#nama').val('')
            $('#sisa_cuti').val('')
        } else {
            $.ajax({
                url: "{{url('')}}/ambil-nama/" + nama,
                success: function(res) {
                    $('#sisa_cuti').val(res.sisa_cuti + ' hari');
                    $('#id').val(res.id);
                }
            })
        }
    }
</script>
@endsection