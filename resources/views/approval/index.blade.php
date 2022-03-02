@extends('layouts.master')

@section('navbar')
@include('layouts.navbar')
<br>
@endsection
@section('content')
<div class="section-header">
    <h1>Pengajuan Cuti</h1>
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
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data->count())
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nomer_surat }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->jenis_cuti }}</td>
                        <td>{{ $d->tanggal_mulai }}</td>
                        <td>
                            <form action="/data/approval/{{ $d->id }}">
                                @method('put')
                                @csrf
                                @empty($d->detail)
                                <a href="/data/approval/{{ $d->id }}" class="btn btn-icon btn-light mr-2"><i class="fas fa-eye"></i></a>
                                @else

                                {!! $d->detail !!}

                                @endempty
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center font-weight-bold">Data ajukan cuti tidak ada</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection