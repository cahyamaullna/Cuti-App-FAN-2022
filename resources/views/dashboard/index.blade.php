@extends('layouts.master')

@section('navbar')
@include('layouts.navbar')
<br>
@endsection

@section('content')
@can('admin')
<div class="section-header">
  <h1>Dashboard Admin</h1>
</div>
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-users"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Karyawan</h4>
        </div>
        <div class="card-body">
          {{ $karyawan->count() }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="fas fa-user-ninja"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Atasan</h4>
        </div>
        <div class="card-body">
          {{ $atasan->count() }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="fas fa-user-tag"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>HRD</h4>
        </div>
        <div class="card-body">
          {{ $hrd->count() }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="fas fa-user-tie"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Direktur</h4>
        </div>
        <div class="card-body">
          {{ $direktur->count() }}
        </div>
      </div>
    </div>
  </div>
  @endcan

  <!-- <--karyawan-->
  @can('not_admin')

  <div class="col-12 mb-4">
    <div class="hero text-white hero-bg-image hero-bg-parallax" data-background="../../assets/img/unsplash/andre-benz-1214056-unsplash.jpg">
      <div class="hero-inner">
        <h2>Selamat Datang, {{auth()->user()->nama}}!</h2>
        <p class="lead">Pekerjaan berlarut-larut membuatmu suntuk? Ayo ajukan cutimu sekarang!</p>
        <br>
        <p>Dalam Pasal 79 ayat 1 disebutkan ketentuan seputar kewajiban perusahaan untuk memberi waktu cuti untuk karyawan. Karyawan berhak mendapat cuti tahunan setelah masa kerjanya lebih dari selama 12 bulan. Jumlah cuti tahunan yang diberikan adalah 12 hari kerja.</p>
        <br>
        <h5>Berikut hal-hal yang dapat mengurangi cuti tahunan :</h4>
          <p>1. Karyawan sakit lebih dari 1 (satu) hari tanpa disertai surat keterangan dokter.</p>
          <p>2. Karyawan tidak hadir dalam keterangan yang tidak dapat di toleransi</p>
          <p>3. Karyawan mengajukan ijin pribadi dengan keterangan diluar syarat-syarat ijin.</p>
          <div class="mt-4">
            <a href="data/cuti/create" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Ajukan Cuti</a>
          </div>
      </div>
    </div>
  </div>

  @endcan
  @endsection