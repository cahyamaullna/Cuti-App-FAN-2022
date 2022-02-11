@extends('layouts.master')

@section('navbar')
@include('layouts.navbar')
<br>
@endsection
@section('content')
<div class="section-header">
  <h1>Pengurangan Cuti</h1>
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
            <th scope="col">NPP</th>
            <th scope="col">Nama</th>
            <th scope="col">Jumlah Hari</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @if($data->count())
          @foreach($data as $d)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $d->user->nama }}</td>
            <td>{{ $d->user->npp }}</td>
            <td>{{ $d->total_hari }} hari</td>
            <td>{{ $d->keterangan }}</td>
            <td>
              <a href="approval/detail/{{ $d->id }}" class="btn btn-icon btn-light mr-2" title="" data-original-title="Detail"><i class="fas fa-eye"></i></a>
            </td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="4" class="text-center font-weight-bold">Data Yang Dicari Tidak Ada</td>
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