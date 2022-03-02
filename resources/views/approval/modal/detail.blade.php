<form action="" method="post" enctype="multipart/form-data">
    <div class="modal fade text-left" id="ModalDetail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__('Detail')}}</h4>
            </div>
            
<div class="row">
    <div class="col-sm-12 col-md-10 col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="/data/approval" class="btn btn-info" style="border-radius: 0;">Back</a>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <div class="mb-3 w-50">
                        <label class="form-label">NPP</label>
                        <input type="text" class="form-control" value="{{ auth()->user()->npp }}" readonly>
                        <input type="hidden" value="{{ auth()->user()->id }}" id="user">
                    </div>

                    <div class="mb-3 w-50 ml-2">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ auth()->user()->nama }}" readonly>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="mb-3 w-50">
                        <label for="jenis_cuti" class="form-label">Jenis Cuti</label>
                        <input type="text" class="form-control" value="" readonly>
                    </div>
                    <div class="mb-3 w-50 ml-2">
                        <label class="form-label">Jumlah Hari</label>
                        <input type="text" class="form-control" id="jumlahhari" name="jumlah_hari" value="{{ old('jumlah_hari') }}" readonly>
                    </div>

                    <div class="mb-3 w-50 ml-2">
                        <label for="sisa_cuti" class="form-label">Sisa Cuti</label>
                        <input type="text" class="form-control @error('sisa_cuti') is-invalid @enderror" name="sisa_cuti" value="{{ old('sisa_cuti') }}" id="sisacuti" readonly>
                    </div>

                </div>
                <div class="d-flex">
                    <div class="mb-3 w-50">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control @error('tanggal_mulai') bg-outline-danger @enderror" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" readonly>
                    </div>

                    <div class="mb-3 w-50 ml-2">
                        <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control @error('tanggal_akhir') bg-outline-danger @enderror" name="tanggal_akhir" value="{{ old('tanggal_akhir') }}" readonly>
                    </div>
                    <div class="mb-3 w-50 ml-2">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') }}" readonly>
                        @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <br>
                <h5>Pengganti Cuti</h5>
                <hr />
                <div class="d-flex">
                    <div class="mb-3 w-50">
                        <label for="npp_pengganti" class="form-label">NPP</label>
                        <input type="number" class="form-control @error('npp_pengganti') is-invalid @enderror" name="npp_pengganti" value="{{ old('npp_pengganti') }}" readonly>
                        @error('npp_pengganti')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3 w-50 ml-2">
                        <label for="nama_pengganti" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama_pengganti') is-invalid @enderror" name="nama_pengganti" value="{{ old('nama_pengganti') }}" readonly>
                        @error('nama_pengganti')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <a href="#" class="btn btn-danger">Tolak</a>
                    <button type="submit" class="btn btn-primary">Terima</button>
                </div>
            </div>
            <hr>
            <div class="card-footer">
                Project By &hearts; Grup 1</a>
            </div>
        </div>
    </div>
</div>
        </div>
        </div>
    </div>
</form>


