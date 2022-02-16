@extends('layouts.master')

@section('navbar')
@include('layouts.navbar')
<br>
@endsection
@section('content')
<div class="section-header">
  <h1>Data Cuti</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="cuti/create" class="btn btn-primary p-2">Ajukan Cuti</a></div>
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
      <table class="table table-bordered">
        <thead class="table-info">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Nomor Surat</th>
            <th scope="col">NPP</th>
            <th scope="col">Jenis Cuti</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Hasil</th>
          </tr>
        </thead>
        <tbody>
          @if($cuti->count())
          @foreach($cuti as $c)
          <tr>
            <td width="20px">{{ ++$i }}</td>
            <td>{{ $c->user->nama }}</td>
            <td>{{ $c->nomer_surat}}</td>
            <td>{{ $c->user->npp }}</td>
            <td>{{ $c->jenis_cuti }}</td>
            <td>{{ $c->tanggal_mulai}}</td>
            <td>{{ $c->keterangan }}</td>
            <td>
              @if($c->atasan === 1 && $c->hrd === 1 && $c->direktur === 1 )
              <div class="badge badge-success">Disetujui</div>
              @elseif($c->atasan === 0 || $c->hrd === 0 || $c->direktur || 0 )
              <div class="badge badge-danger">Ditolak</div>
              @else
              <div class="badge badge-warning">Diproses</div>
              @endif
            </td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="8" class="text-center font-weight-bold">Data cuti tidak ada</td>
          </tr>
          @endif
        </tbody>
      </table>
      <div class="d-flex justify-content-end">
        {{ $cuti->links() }}
      </div>
    </div>
  </div>
</div>
@endsection