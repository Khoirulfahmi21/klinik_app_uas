@extends('layouts.admin_app')
 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header bg-dark text-light">{{ __('HALAMAN DOKTER') }}</div>

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
                                                        <label class="font-weight-bold">ID DOKTER</label>
                                                        <input type="text" class="form-control @error('id_dokter') is-invalid @enderror" name="id_dokter" value="{{ old('id_dokter', $dokters->id_dokter) }}" readonly>
                                                    
                                                        <!-- error message untuk id_dokter -->
                                                        @error('id_dokter')
                                                            <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="font-weight-bold">NAMA DOKTER</label>
                                                        <input type="text" class="form-control @error('nama_dokter') is-invalid @enderror" name="nama_dokter" value="{{ old('nama_dokter', $dokters->nama_dokter) }}" readonly>
                                                    
                                                        <!-- error message untuk nama_dokter -->
                                                        @error('nama_dokter')
                                                            <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>  


                                            <div class="row">

                                                <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="font-weight-bold">SPESIALISASI</label>
                                                            <input type="text" class="form-control @error('spesialisasi') is-invalid @enderror" name="spesialisasi" value="{{ old('spesialisasi', $dokters->spesialisasi) }}" readonly>
                                                        
                                                            <!-- error message untuk spesialisasi -->
                                                            @error('spesialisasi')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label class="font-weight-bold">JADWAL PRKTIK</label>
                                                            <input type="text" class="form-control @error('jadwal_praktik') is-invalid @enderror" name="jadwal_praktik" value="{{ old('jadwal_praktik', $dokters->jadwal_praktik) }}" readonly>
                                                        
                                                            <!-- error message untuk jadwal_praktik -->
                                                            @error('jadwal_praktik')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>  


                                                    <div class="modal-footer">
                                                        <a href="/admin/dokter" class="btn btn-md btn-basic me-4">KEMBALI</a>

                                                        <div class="btn-group">
                                                            <a href="/admin/dokter" class="btn btn-md btn-dark me-4">OK</a>
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
    <script>
        CKEDITOR.replace( '#' );
    </script>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
