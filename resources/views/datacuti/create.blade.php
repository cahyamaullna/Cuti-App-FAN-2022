@extends('layouts.master')
@section('content')
<div class="section-header mt-n4">
    <h2>Form cuti FAN 2022</h2>
</div>
<div class="p-2 card shadow mb-4">
    <div class="card-body pl-3">
        <form action="/data/cuti" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex">
                <div class="mb-3 w-50">
                    <label class="form-label">NPP</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->npp }}" readonly>
                    <input type="hidden" class="form-control" name="nomer_surat" value="{{ $nomer }}" readonly>
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
                    <select class="form-control @error('jeniscuti_id') bg-outline-danger @enderror" name="jeniscuti_id" id="jeniscuti" onchange="updateJumlahHari()">
                        <option value=""> Pilih Jenis Cuti</option>
                        @foreach($jeniscuti as $jeniscuti)
                        @if(old('jeniscuti_id') == $jeniscuti->id)
                        <option value="{{ $jeniscuti->id }}" selected>{{ $jeniscuti->nama }}</option>
                        @else
                        <option value="{{ $jeniscuti->id }}">{{ $jeniscuti->nama }}</option>
                        @endif
                        @endforeach
                    </select>
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
                    <input type="date" class="form-control @error('tanggal_mulai') bg-outline-danger @enderror" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}">
                </div>

                <div class="mb-3 w-50 ml-2">
                    <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                    <input type="date" class="form-control @error('tanggal_akhir') bg-outline-danger @enderror" name="tanggal_akhir" value="{{ old('tanggal_akhir') }}">
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
                    <input type="number" class="form-control @error('npp_pengganti') is-invalid @enderror" name="npp_pengganti" value="{{ old('npp_pengganti') }}">
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
                    <label for="foto_bukti" class="form-label">Upload Files</label>
                    <input type="file" class="form-control border-0 pl-0 @error('foto_bukti') is-invalid @enderror" name="foto_bukti">
                    @error('foto_bukti')
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
                    if (jeniscuti == 1 || select == "Tahunan" || select == "tahunan") {
                        if (res[0] == null) {
                            $('#sisacuti').val('12 hari')
                        } else {
                            $('#sisacuti').val(res[0].sisa_cuti + ' hari')
                        }
                    }
                }
            })
        }
    }
</script>
@endsection