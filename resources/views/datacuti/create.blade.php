@extends('layouts.master')
@section('content')
<div class="section-header mt-n4">
    <h2>Form cuti FAN 2021</h2>
</div>
<div class="p-2 card shadow mb-4">
    <div class="card-body pl-3">
        <form action="#" method="post">
            @csrf
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label for="#" class="form-label">Nomor Surat</label>
                    <input type="text" class="form-control" name="#" readonly>
                </div>
                <div class="mb-3 w-50 ml-2">
                    <label for="#" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="#" readonly>
                </div>
            </div>
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label for="#" class="form-label">NPP</label>
                    <input type="text" class="form-control" name="#" required autofocus>
                </div>
                <div class="mb-3 w-50 ml-2">
                    <label for="#" class="form-label">Jenis Cuti</label>
                    <select class="form-control" name="#">
                        <option value="cuti tahunan">Cuti tahunan</option>
                        <option value="cuti menikah">Cuti menikah</option>
                        <option value="cuti melahirkan">Cuti melahirkan</option>
                        <option value="cuti keluarga inti meninggal">Cuti keluarga inti meninggal</option>
                        <option value="cuti kakek/nenek">Cuti kakek/nenek</option>
                        <option value="cuti mendampingi istri melahirkan">Cuti mendampingi istri melahirkan</option>
                        <option value="cuti keguguran">Cuti keguguran</option>
                        <option value="cuti keluarga non inti namun dalam satu rumah">Cuti keluarga non inti namun dalam satu rumah</option>
                    </select>
                </div>
            </div>
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label for="#" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="#" required>
                </div>
                <div class="mb-3 w-50 ml-2">
                    <label for="#" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" name="#" required>
                </div>
            </div>
            <div class="mb-3">
                <a href="/data/cuti" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection