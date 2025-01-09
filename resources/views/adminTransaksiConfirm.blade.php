@extends('layouts.admin_app')
 
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
                                    <form action="{{ route('transaksi.update', $transaksis->kode_trx) }}" method="POST" enctype="multipart/form-data" >
                                        
                                    @csrf
                                    @method('PUT') <!-- Pastikan menggunakan metode PUT -->

                                    

                                        <div class="row"> 

                                            <div class="col-md-6">            
                                                <div class="form-group mb-3">
                                                    <label class="font-weight-bold">KODE TRANSAKSI</label>
                                                    <input type="text" class="form-control" value="{{ $transaksis->kode_trx }}" readonly>
                                                    <input type="text" class="form-control" name="kode_trx" value="{{ $transaksis->kode_trx }}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="font-weight-bold">PASIEN</label>
                                                    <input type="text" class="form-control"  value="{{ $transaksis->user->name }}" readonly>
                                                    <input type="text" class="form-control" name="id_user" value="{{ $transaksis->id_user }}" readonly>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row"> 

                                            <div class="col-md-6">            
                                                <div class="form-group mb-3">
                                                    <label class="font-weight-bold">LAYANAN</label>
                                                    <input type="text" class="form-control"  value="{{ $transaksis->layanan->nama_layanan }}" readonly>
                                                    <input type="text" class="form-control" name="kode_layanan" value="{{ $transaksis->kode_layanan }}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="font-weight-bold">DOKTER</label>
                                                    <input type="text" class="form-control" value="{{ $transaksis->dokter->nama_dokter }}" readonly>
                                                    <input type="text" class="form-control" name="id_dokter" value="{{ $transaksis->id_dokter }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row"> 

                                            <div class="col-md-6">            
                                                <div class="form-group mb-3">
                                                    <label class="font-weight-bold">JADWAL TEMU</label>
                                                    <input type="text" class="form-control" value="{{ $transaksis->jadwal_temu }}" readonly>
                                                    <input type="text" class="form-control" name="jadwal_temu" value="{{ $transaksis->jadwal_temu }}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="font-weight-bold">RUANGAN</label>
                                                    <input type="text" class="form-control" value="{{ $transaksis->ruangan->nama_ruangan }}" readonly>
                                                    <input type="text" class="form-control" name="kode_ruangan" value="{{ $transaksis->kode_ruangan }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row"> 

                                            <div class="col-md-6">            
                                                <div class="form-group mb-3">
                                                    <label class="font-weight-bold">TOTAL BIAYA</label>
                                                    <input type="text" class="form-control" name="total_biaya"value="{{ $transaksis->total_biaya }}" readonly>
                                                    
                                                </div>
                                            </div>

                                            <input type="hidden" class="form-control" name="status_trx" value="Terkonfirmasi" readonly>
                                        </div>


                                        <div class="modal-footer">
                                                        <a href="/admin/transaksi" class="btn btn-md btn-basic me-4">KEMBALI</a>

                                                        <div class="btn-group">
                                                            
                                                            <button type="submit" class="btn btn-md btn-dark"> KONFIRMASI</button>
                                                        </div>	

                                                    </div>      

                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>


                </div>
            </div>
        </div>
    </div>
</div>



@endsection
