@extends('layouts.master')
@section('content')
<div class="section-header mt-n4">
    <h2>Form cuti FAN 2022</h2>
</div>
<div class="p-2 card shadow mb-4">
    <div class="card-body pl-3">
        <form action="/data/cuti" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label class="form-label">NPP</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->npp }}" readonly>
                    <input type="hidden" class="form-control" name="nomer_surat" value="{{ $nomer }}" readonly>
                </div>

                <div class="mb-3 w-50 ml-2">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->nama }}" readonly>
                </div>
            </div>
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label for="jenis_cuti" class="form-label">Jenis Cuti</label>
                    <select class="form-control" name="jeniscuti_id">
                        @foreach($jeniscuties as $jeniscuti)
                        <option value="{{ $jeniscuti->id }}">{{ $jeniscuti->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 w-50 ml-2">
                    <label class="form-label">Jumlah Hari</label>
                    <input type="text" class="form-control" value="{{ $jeniscuti->jumlah_hari }} hari" readonly>
                </div>

                <div class="mb-3 w-50 ml-2">
                    <label for="sisa_cuti" class="form-label">Sisa Cuti</label>
                    <input type="text" class="form-control" name="sisa_cuti" placeholder="0 hari" readonly>
                </div>

            </div>
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}">
                    @error('tanggal_mulai')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 w-50 ml-2">
                    <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                    <input type="date" class="form-control @error('tanggal_akhir') is-invalid @enderror" name="tanggal_akhir" value="{{ old('tanggal_akhir') }}">
                    @error('tanggal_akhir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 w-50 ml-2">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') }}">
                    @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <br>
            <h5>Pengganti Cuti</h5>
            <hr />
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label for="npp_pengganti" class="form-label">NPP</label>
                    <input type="number" class="form-control @error('npp_pengganti') is-invalid @enderror" name="npp_pengganti" value="{{ old('npp_pengganti') }}">
                    @error('npp_pengganti')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 w-50 ml-2">
                    <label for="nama_pengganti" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama_pengganti') is-invalid @enderror" name="nama_pengganti" value="{{ old('nama_pengganti') }}">
                    @error('nama_pengganti')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 w-50 ml-2">
                    <label for="upload_bukti" class="form-label">Upload Files</label>
                    <input type="file" class="form-control border-0 pl-0 @error('upload_bukti') is-invalid @enderror" name="upload_bukti">
                    @error('upload_bukti')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <a href="/data/cuti" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection