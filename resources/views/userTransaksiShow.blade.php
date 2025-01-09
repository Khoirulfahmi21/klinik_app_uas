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
                                        <form action="#" method="POST" enctype="multipart/form-data">
                                        
                                            @csrf

                                    

                                        <div class="row"> 

                                            <div class="col-md-6">            
                                                <div class="form-group mb-3">
                                                    <label class="font-weight-bold">KODE TRANSAKSI</label>
                                                    <input type="text" class="form-control" value="{{ $transaksis->kode_trx }}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="font-weight-bold">PASIEN</label>
                                                    <input type="text" class="form-control" value="{{ $transaksis->user->name }}" readonly>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row"> 

                                            <div class="col-md-6">            
                                                <div class="form-group mb-3">
                                                    <label class="font-weight-bold">LAYANAN</label>
                                                    <input type="text" class="form-control" value="{{ $transaksis->layanan->nama_layanan }}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="font-weight-bold">DOKTER</label>
                                                    <input type="text" class="form-control" value="{{ $transaksis->dokter->nama_dokter }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row"> 

                                            <div class="col-md-6">            
                                                <div class="form-group mb-3">
                                                    <label class="font-weight-bold">JADWAL TEMU</label>
                                                    <input type="text" class="form-control" value="{{ $transaksis->jadwal_temu }}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="font-weight-bold">RUANGAN</label>
                                                    <input type="text" class="form-control" value="{{ $transaksis->ruangan->nama_ruangan }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row"> 

                                            <div class="col-md-6">            
                                                <div class="form-group mb-3">
                                                    <label class="font-weight-bold">TOTAL BIAYA</label>
                                                    <input type="text" class="form-control" value="{{ $transaksis->total_biaya }}" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label class="font-weight-bold">STATUS</label>
                                                    <input type="text" class="form-control" value="{{ $transaksis->status_trx }}" readonly>
                                                </div>
                                            </div>
                                        </div>


                                                    <div class="modal-footer">
                                                        <a href="/user/transaksi" class="btn btn-md btn-basic me-4">KEMBALI</a>

                                                        <div class="btn-group">
                                                            <a href="/user/transaksi" class="btn btn-md btn-dark me-4">OK</a>
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
