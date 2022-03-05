@extends('layouts.master')

@section('navbar')
@include('layouts.navbar')
<br>
@endsection
@section('content')
<div class="section-header">
  <h1>Pengurangan Cuti</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="pengurangan-cuti/create" class="btn btn-primary p-2">Tambah</a></div>
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
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="table-info">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Pengurangan Hari</th>
              <th scope="col">Sisa Cuti Sekarang</th>
              <th scope="col">Keterangan</th>
            </tr>
          </thead>
          <tbody>
            @if($data->count())
            @foreach($data as $d)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $d->nama }}</td>
              <td>{{ $d->pengurangan_cuti }}</td>
              <td>{{ $d->sisa_cuti }} hari</td>
              <td>{{ $d->keterangan }}</td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="6" class="text-center font-weight-bold">Data tidak ada</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-end">
        {{ $data->links() }}
      </div>
    </div>
  </div>
</div>
@endsection