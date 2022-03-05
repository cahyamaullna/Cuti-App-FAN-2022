@extends('layouts.master')
@section('content')
<div class="p-2 card shadow mb-4">
    <div class="card-header pl-3 mb-n4">
        <h3>Detail Cuti</h3>
    </div>
    <hr />
    <div class="card-body pl-3">
        <form action="/data/approval/{{ $data->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label class="form-label">Nomer Surat</label>
                    <input type="text" class="form-control" value="{{ $data->nomer_surat }}" readonly>
                </div>
                <div class="mb-3 w-50 ml-2">
                    <label class="form-label">NPP</label>
                    <input type="text" class="form-control" value="{{ $data->user->npp }}" readonly>
                </div>

                <div class="mb-3 w-50 ml-2">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" value="{{ $data->user->nama }}" readonly>
                </div>
            </div>
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                    <input type="text" class="form-control" value="{{ $data->tanggal_mulai }}" readonly>
                </div>

                <div class="mb-3 w-50 ml-2">
                    <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                    <input type="text" class="form-control" value="{{ $data->tanggal_akhir }}" readonly>
                </div>
                <div class="mb-3 w-50 ml-2">
                    <label class="form-label">Jumlah Hari</label>
                    <input type="text" class="form-control" value="{{ $data->total_hari }} hari" name="total_hari" readonly>
                    <input type="hidden" class="form-control" value="{{ $data->sisa_cuti }}" name="sisa_cuti" readonly>
                    <input type="hidden" class="form-control" value="{{ $data->user_id }}" name="user_id" readonly>
                </div>

            </div>
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label for="jenis_cuti" class="form-label">Jenis Cuti</label>
                    <input type="text" class="form-control" value="{{ $data->jenis_cuti }}" name="jenis_cuti" readonly>
                </div>
                <div class="mb-3 w-50 ml-2">
                    <label for="foto_bukti" class="form-label d-block mb-3">Foto/File</label>
                    <a href="/download/{{ $data->id }}" class="text-primary">Download <i class="fas fa-download"></i></a>
                </div>
                <div class="mb-3 w-50 ml-2">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="m-0 p-1" cols="40" rows="4" readonly>{{ $data->keterangan }}</textarea>
                </div>
            </div>
            <br>
            <h5>Pengganti Cuti</h5>
            <hr />
            <div class="d-flex mb-5">
                <div class="w-50">
                    <label for="npp_pengganti" class="form-label">NPP</label>
                    <input type="text" class="form-control" value="{{ $data->npp_pengganti }}" readonly>
                </div>

                <div class="w-50 ml-2">
                    <label for="nama_pengganti" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" value="{{ $data->nama_pengganti }}" readonly>
                </div>
                <div class="w-50 ml-2">
                    <label for="approval" class="form-label d-block">Approval</label>
                    {!! $data->approval !!}
                </div>
            </div>
        </form>
    </div>
</div>
@endsection