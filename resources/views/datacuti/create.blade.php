@extends('layouts.master')
@section('content')
<div class="p-2 card shadow mb-4">
    <div class="card-header pl-3 mb-n2">
        <h3>Form Pengajuan Cuti</h3>
    </div>
    <div class="card-body pl-3">
        <form action="/data/cuti" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label class="form-label">NPP</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->npp }}" readonly>
                    <input type="hidden" class="form-control" name="nomer_surat" value="{{ $nomer }}" readonly>
                    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id" id="user">
                </div>

                <div class="mb-3 w-50 ml-2">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->nama }}" readonly>
                </div>
            </div>
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label for="jenis_cuti" class="form-label">Jenis Cuti</label>
                    <select class="form-control @error('jenis_cuti') is-invalid @enderror" name="jenis_cuti" id="jeniscuti" onchange="updateJumlahHari()">
                        <option value="">Pilih Jenis Cuti</option>
                        @foreach($jeniscuti as $jcuti)
                        <option value="{{ $jcuti->nama }}">{{ $jcuti->nama }}</option>
                        @endforeach
                    </select>
                    @error('jenis_cuti')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 w-50 ml-2">
                    <label class="form-label">Jumlah Hari</label>
                    <input type="text" class="form-control" id="jumlahhari" name="jumlah_hari" readonly>
                </div>

                <div class="mb-3 w-50 ml-2">
                    <label for="sisa_cuti" class="form-label">Sisa Cuti</label>
                    <input type="text" class="form-control @error('sisa_cuti') is-invalid @enderror" name="sisa_cuti" id="sisacuti" readonly>
                    <input type="hidden" class="form-control" name="sisa_cuti" id="sisacuti2" readonly>
                    @error('sisa_cuti')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}">
                    @error('tanggal_mulai')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 w-50 ml-2">
                    <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                    <input type="date" class="form-control @error('tanggal_akhir') is-invalid @enderror" name="tanggal_akhir" value="{{ old('tanggal_akhir') }}">
                    @error('tanggal_akhir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 w-50 ml-2">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') }}">
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
                    <input type="text" class="form-control @error('npp_pengganti') is-invalid @enderror" name="npp_pengganti" value="{{ old('npp_pengganti') }}">
                    @error('npp_pengganti')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 w-50 ml-2">
                    <label for="nama_pengganti" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama_pengganti') is-invalid @enderror" name="nama_pengganti" value="{{ old('nama_pengganti') }}">
                    @error('nama_pengganti')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 w-50 ml-2">
                    <label for="files" class="form-label">Upload Foto/File</label>
                    <input type="file" class="form-control border-0 pl-0 @error('files') is-invalid @enderror" name="files">
                    @error('files')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
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

@section('js')
<script>
    $('.bg-outline-danger').css("border-color", "red");

    function updateJumlahHari() {
        let jeniscuti = $('#jeniscuti').val()
        let user = $('#user').val()
        let select = $('#jeniscuti option:selected').text()

        $('#jumlahhari').val('')
        $('#sisacuti').val('')
        $('#sisacuti2').val('')

        if (jeniscuti != '' && jeniscuti != null) {
            $.ajax({
                url: "{{url('')}}/jeniscuti/" + jeniscuti,
                success: function(res) {
                    $('#jumlahhari').val(res[0].jumlah_hari + ' hari')
                }
            })

            $.ajax({
                url: "{{url('')}}/sisacuti/" + user,
                success: function(res) {
                    if (select == "Tahunan" || select == "tahunan") {
                        if (res[0] == null) {
                            $('#sisacuti').val('12 hari')
                            $('#sisacuti2').val('12 hari')
                        } else {
                            $('#sisacuti').val(res[0].sisa_cuti + ' hari')
                            $('#sisacuti2').val(res[0].sisa_cuti + ' hari')
                        }
                    } else {
                        if (res[0] == null) {
                            $('#sisacuti2').val('12 hari')
                        } else {
                            $('#sisacuti2').val(res[0].sisa_cuti + ' hari')
                        }
                    }
                }
            })
        }
    }
</script>
@endsection