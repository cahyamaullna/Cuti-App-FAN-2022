@extends('layouts.master')

@section('navbar')
@include('layouts.navbar')
<br>
@endsection
@section('content')
<div class="section-header">
    <h1>Data Ajukan Cuti</h1>
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
                        <th scope="col">Tanggal (apa?)</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $d->user->npp }}</td>
                        <td>{{ $d->user->nama }}</td>
                        <td>{{ $d->jeniscuti->nama }}</td>
                        <td>{{ $d->tanggal_mulai }}</td>
                        <td>
                            <a href="approval/detail/{{ $d->id }}" class="btn btn-icon btn-light mr-2" title="" data-original-title="Detail"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>

@endsection