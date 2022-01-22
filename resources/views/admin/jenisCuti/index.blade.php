@extends('layouts.master')

@section('navbar')
@include('layouts.navbar')
<br>
@endsection
@section('content')
<div class="section-header">
    <h1>Jenis Cuti</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="/admin/jenis-cuti/create" class="btn btn-primary p-2">Tambah</a></div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card shadow p-2">
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if(session('delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('delete') }}
            </div>
            @endif
            <table class="table table-bordered">
                <thead class="table-info">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jenis Cuti</th>
                        <th scope="col">Jumlah Hari</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data->count())
                    @foreach($data as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->jumlah_hari }} hari</td>
                        <td width="150px">
                            <form action="jenis-cuti/{{ $data->id }}" method="post">
                                @csrf
                                @method('delete')
                                <a class="btn btn-primary btn-action mr-1" href="jenis-cuti/{{ $data->id }}/edit"><i class="fas fa-pencil-alt"></i></a>
                                <button class="btn btn-danger" onclick="return confirm('Hapus data {{ $data->nama }}?');"><i class=" fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center font-weight-bold">Jenis Cuti Tidak ada</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection