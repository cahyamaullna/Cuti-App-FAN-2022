@extends('layouts.master')

@section('navbar')
@include('layouts.navbar')
<br>
@endsection
@section('content')
<!-- Main Content -->
<div class="section-header">
    <h1>Detail</h1>
</div>
    <div class="row">
        <div class="col-sm-12 col-md-10 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="" class="btn btn-info" style="border-radius: 0;">Back</a>
                </div>
                <div class="card-body">
                    <div class="form-group">
                    <label for="tc">Nomor Surat</label>
                    <input type="text" value="" id="tc" readonly class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="tc">Nama</label>
                    <input type="text" value="" id="tc" readonly class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="tc">Jenis Cuti</label>
                    <input type="text" value="" id="tc" readonly class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="tc">Tanggal</label>
                    <input type="date" value="" id="tc" readonly class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="tc">Action</label>
                        <br>
                        <button class="badge badge-danger border-0 border-circle"><i class="fas fa-times-circle"></i></button>
                        <button class="badge badge-success border-0"><i class="fas fa-check"></i></button>
                    </div>
                </div>
                <hr>
                <div class="card-footer">
                    Project By &hearts; Aisyah Humairoh</a>
                </div>
            </div>
        </div>
    </div>
<!-- end Main Content -->
@endsection
