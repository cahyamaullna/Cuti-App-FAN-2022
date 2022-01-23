@extends('layouts.master')

@section('navbar')
@include('layouts.navbar')
<br>
@endsection
@section('content')
<div class="section-header">
    <h1>Data Cuti</h1>
</div>
<div class="row">
    <div class="col">
        <div class="card shadow p-2">
            <table class="table table-bordered">
                <thead class="table-info">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nomor Surat</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Cuti</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>12345678</td>
                        <td>Fadly</td>
                        <td>Cuti Kakek/Nenek</td>
                        <td>2021/8/31</td>
                        <td><a href="approval/detail" class="btn btn-icon btn-light mr-2" title="" data-original-title="Detail"><i class="fas fa-eye"></i></a></td>
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