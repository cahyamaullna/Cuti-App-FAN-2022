@extends('layouts.master')

@section('navbar')
@include('layouts.navbar')
<br>
@endsection
@section('content')
<div class="section-header">
  <h1>Data Akun</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{ route('datacuti.create') }}" class="btn btn-primary p-2">Tambah Akun</a></div>
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
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Level</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Cahya</td>
            <td>cahya@gmail.com</td>
            <td>1234567</td>
            <td>Karyawan</td>
            <td><button class="btn btn-warning">Edit</button><button class="btn btn-danger">Hapus</button></td>
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