@extends('layouts.master')
@section('content')
<div class="section-header">
<h2>Register</h2>
</div>   
</header>
<div class="p-2 card shadow mb-4">
    <div class="card-body pl-0">
        <form action="#" method="post">
            @csrf
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label for="#" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="#" required autofocus>
                </div>
                <div class="mb-3 w-50 ml-2">
                    <label for="#" class="form-label">Email</label>
                    <input type="text" class="form-control" name="#" required autofocus>
                </div>
            </div>
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label for="#" class="form-label">Password</label>
                    <input type="text" class="form-control" name="#" required autofocus>
                </div>
                <div class="mb-3 w-50 ml-2">
                    <label for="#" class="form-label">Level</label>
                    <select class="form-control" name="#">
                        <option value="karyawan">Karyawan</option>
                        <option value="hrd">HRD</option>
                        <option value="direktur">Direktur</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <a href="/admin" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection