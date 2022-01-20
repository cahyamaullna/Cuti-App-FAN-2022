@extends('layouts.master')

@section('navbar')
@include('layouts.navbar')
<br>
@endsection
@section('content')
<div class="section-header">
  <h1>Data Akun</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="/admin/data-pegawai/create" class="btn btn-primary p-2">Tambah Akun</a></div>
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
            <th scope="col">Nama</th>
            <th scope="col">NPP</th>
            <th scope="col">Email</th>
            <th scope="col">Posisi</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->npp }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->posisi }}</td>
            <td>
              <form action="data-pegawai/{{ $data->id }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger" onclick="return confirm('Hapus data {{ $data->nama }}?');"><i class=" fas fa-trash"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection