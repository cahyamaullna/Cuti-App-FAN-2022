@extends('layouts.master')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('content')
<<<<<<< HEAD
<div class="section-header">
  <h1>Data Cuti</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="cuti/create" class="btn btn-primary p-2">Ajukan Cuti</a></div>
  </div>
</div>
<div class="row">
  <div class="col">
    <div class="card shadow p-2">
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
          @if($cuties->count())
          @foreach($cuties as $cuti)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $cuti->user->nama }}</td>
            <td>{{ $cuti->nomer_surat}}</td>
            <td>{{ $cuti->user->npp }}</td>
            <td>{{ $cuti->jenis_cuti }}</td>
            <td>{{ $cuti->tanggal_mulai}}</td>
            <td>{{ $cuti->keterangan }}</td>
            <td>
              <div class="badge badge-warning">Proses</div>
            </td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="8" class="text-center font-weight-bold">Data Cuti Tidak Ada</td>
          </tr>
          @endif
        </tbody>
      </table>
=======
<header class="d-flex align-items-center justify-content-between mt-3 mb-2">
    <h2>Data Cuti</h2>
    <a href="/cuti/create" class="btn btn-primary p-2">Ajukan Cuti</a>
</header>
<div class="row">
    <div class="col">
        <div class="card shadow p-2">
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
                    <tr>
                        <th scope="row">1</th>
                        <td>Fadly</td>
                        <td>12345678</td>
                        <td>1234567</td>
                        <td>Cuti Kakek/Nenek</td>
                        <td>2021/8/31</td>
                        <td>Kakek saya .......</td>
                        <td><button class="btn btn-warning">Proses</button></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Fadly</td>
                        <td>123456789</td>
                        <td>12345678</td>
                        <td>Cuti Menikah</td>
                        <td>2021/10/31</td>
                        <td>Saya akan .......</td>
                        <td><button class="btn btn-success">Setuju</button></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Fadly</td>
                        <td>1234567810</td>
                        <td>123456711</td>
                        <td>Cuti Melahirkan</td>
                        <td>2021/12/25</td>
                        <td>Saya tidak melahirkan.......</td>
                        <td><button class="btn btn-danger">Tolak</button></td>
                    </tr>
                </tbody>
            </table>
            <!-- <div class="pull-right">
        <a class="btn btn-success" href="#"> Ajukan Cuti</a>
      </div> -->
        </div>
>>>>>>> 418e8ec2b765f9edac287cbbb6ea788e39cfb446
    </div>
</div>
@endsection