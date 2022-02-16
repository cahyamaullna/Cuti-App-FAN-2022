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
                        <th scope="col">Tanggal Awal</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data->count())
                    @foreach($data as $d)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $d->nomer_surat }}</td>
                        <td>{{ $d->user->nama }}</td>
                        <td>{{ $d->jenis_cuti }}</td>
                        <td>{{ $d->tanggal_mulai }}</td>
                        <td>
                            @if($d->hrd === null)
                            <form action="/data/approval/{{ $d->id }}">
                                @method('put')
                                @csrf
                                <a href="/data/approval/{{ $d->id }}" class="btn btn-icon btn-light mr-2"><i class="fas fa-eye"></i></a>
                            </form>
                            @elseif($d->hrd === 1)
                            <div class="badge badge-success">Disetujui</div>
                            @elseif($d->hrd === 0)
                            <div class="badge badge-danger">Ditolak</div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center font-weight-bold">Data tidak ada</td>
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
@include('approval.modal.index')

@section('js')
@endsection