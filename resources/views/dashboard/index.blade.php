@extends('layouts.master')

@section('navbar')
@include('layouts.navbar')
@endsection

@section('content')
<header class="d-flex align-items-center justify-content-between mt-3 mb-2">
  <h2>Data Cuti</h2>
  <a href="#" class="btn btn-primary p-2">Ajukan Cuti</a>
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
            <td><button class="btn btn-warning">Proses</button></td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Fadly</td>
            <td>123456789</td>
            <td>12345678</td>
            <td>Cuti Menikah</td>
            <td>2021/10/31</td>
            <td><button class="btn btn-success">Setuju</button></td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Fadly</td>
            <td>1234567810</td>
            <td>123456711</td>
            <td>Cuti Melahirkan</td>
            <td>2021/12/25</td>
            <td><button class="btn btn-danger">Tolak</button></td>
          </tr>
        </tbody>
      </table>
      <!-- <div class="pull-right">
        <a class="btn btn-success" href="#"> Ajukan Cuti</a>
      </div> -->
    </div>
  </div>
</div>
@endsection