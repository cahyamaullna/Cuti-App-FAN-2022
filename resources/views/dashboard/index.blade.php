@extends('layouts.master')

@section('navbar')
@include('layouts.navbar')
<br>
@endsection

@section('content')
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
@endsection