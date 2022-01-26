@extends('layouts.master')

@section('navbar')
@include('layouts.navbar')
<br>
@endsection
@section('content')
<div class="section-header">
  <h1>Data Pegawai</h1>
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
          @if($data->count())
          @foreach($data as $d)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $d->nama }}</td>
            <td>{{ $d->npp }}</td>
            <td>{{ $d->email }}</td>
            <td>{{ $d->posisi }}</td>
            <td>
              <form action="data-pegawai/{{ $d->id }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger" onclick="return confirm('Hapus data {{ $d->nama }}?');"><i class=" fas fa-trash"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="6" class="text-center font-weight-bold">Data pegawai tidak ada</td>
          </tr>
          @endif
        </tbody>
      </table>
      <div class="d-flex justify-content-end">
        {{ $data->links() }}
      </div>
    </div>
  </div>
</div>
@endsection