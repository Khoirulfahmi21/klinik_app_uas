@extends('layouts.user_app')
 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-light">{{ __('HALAMAN TRANSAKSI') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 
                    <div class="container mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <form action="{{ route('userTransaksi.store') }}" method="POST" enctype="multipart/form-data">
                                        
                                            @csrf

                                        <hr>

                    <div class="row"> 

                            <div class="col-md-6">            
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">USER</label>
                                    <input type="text" class="form-control" name="id_user" value="{{ Auth::user()->id }}" readonly>
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold">LAYANAN</label>
                                    <select class="form-select @error('kode_layanan') is-invalid @enderror" id="kode_layanan" name="kode_layanan">
                                        <option value="">Pilih Layanan</option>
                                        @foreach($layanans as $layanan)
                                            <option value="{{ $layanan->kode_layanan }}" {{ old('kode_layanan') == $layanan->kode_layanan ? 'selected' : '' }}>
                                                {{ $layanan->nama_layanan }}
                                            </option>
                                        @endforeach
                                    </select>

                                        <!-- error message for kode_layanan -->
                                        @error('kode_layanan')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                            </div>
                    </div>


                    <div class="row"> 

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                        <label class="font-weight-bold">DOKTER</label>
                                        <select class="form-select @error('id_dokter') is-invalid @enderror" name="id_dokter">
                                            <option value="">Pilih dokter</option>
                                            @foreach($dokters as $dokter)
                                                <option value="{{ $dokter->id_dokter }}" {{ old('id_dokter') == $dokter->id_dokter ? 'selected' : '' }}>
                                                    {{ $dokter->nama_dokter }}
                                                </option>
                                            @endforeach
                                        </select>

                                            <!-- error message for id_dokter -->
                                            @error('id_dokter')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                        <label class="font-weight-bold">JADWAL TEMU</label>
                                        <input type="datetime-local" class="form-control @error('jadwal_temu') is-invalid @enderror" name="jadwal_temu" value="{{ old('jadwal_temu') }}" require>
                                
                                    <!-- error message untuk jadwal_temu -->
                                    @error('jadwal_temu')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                        <label class="font-weight-bold">RUANGAN</label>
                                   
                                        <select class="form-select @error('kode_ruangan') is-invalid @enderror" name="kode_ruangan">
                                            <option value="">Pilih Ruangan</option>
                                            @foreach($ruangans as $ruangan)
                                                <option value="{{ $ruangan->kode_ruangan }}" {{ old('kode_ruangan') == $ruangan->kode_ruangan ? 'selected' : '' }}>
                                                    {{ $ruangan->nama_ruangan }}
                                                </option>
                                            @endforeach
                                        </select>
                                
                                </div>
                            </div>

                    </div>

                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">TOTAL BIAYA</label>
                                        <input type="text" class="form-control @error('total_biaya') is-invalid @enderror" id="total_biaya" name="total_biaya" value="{{ old('total_biaya') }}" readonly>
                                
                                    <!-- error message untuk total_biaya -->
                                    @error('total_biaya')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                
                                </div>



                                <input type="hidden" class="form-control" name="status_trx" value="Menunggu Konfirmasi" readonly>



                                            <hr>
                                                    <div class="modal-footer">
                                                        <a href="/user/transaksi" class="btn btn-md btn-basic me-4">KEMBALI</a>

                                                        <div class="btn-group">
                                                            
                                                            <button type="submit" class="btn btn-md btn-dark"> SIMPAN</button>
                                                        </div>	

                                                    </div>   




                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

   <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<!-- Tambahkan CSS Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Tambahkan JavaScript Select2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>




                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#kode_layanan').change(function() {
            var kode_layanan = $(this).val();
            if (kode_layanan) {
                $.ajax({
                    url: '/user-get-harga-layanan/' + kode_layanan,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#total_biaya').val(data.harga_layanan);
                    }
                });
            } else {
                $('#total_biaya').val('');
            }
        });
    });
</script>

@endsection
