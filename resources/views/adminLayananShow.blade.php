@extends('layouts.admin_app')
 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header bg-dark text-light">{{ __('HALAMAN LAYANAN') }}</div>

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
                                                        <label class="font-weight-bold">KODE LAYANAN</label>
                                                        <input type="text" class="form-control @error('kode_layanan') is-invalid @enderror" name="kode_layanan" value="{{ old('kode_layanan', $layanans->kode_layanan) }}" readonly>
                                                    
                                                        <!-- error message untuk kode_layanan -->
                                                        @error('kode_layanan')
                                                            <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="font-weight-bold">NAMA LAYANAN</label>
                                                        <input type="text" class="form-control @error('nama_layanan') is-invalid @enderror" name="nama_layanan" value="{{ old('nama_layanan', $layanans->nama_layanan) }}" readonly>
                                                    
                                                        <!-- error message untuk nama_layanan -->
                                                        @error('nama_layanan')
                                                            <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>  


                                            <div class="row">

                                                <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label class="font-weight-bold">HARGA LAYANAN</label>
                                                            <input type="text" class="form-control @error('harga_layanan') is-invalid @enderror" name="harga_layanan" value="{{ old('harga_layanan', $layanans->harga_layanan) }}" readonly>
                                                        
                                                            <!-- error message untuk harga_layanan -->
                                                            @error('harga_layanan')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                </div>  


                                                    <div class="modal-footer">
                                                        <a href="/admin/layanan" class="btn btn-md btn-basic me-4">KEMBALI</a>

                                                        <div class="btn-group">
                                                            <a href="/admin/layanan" class="btn btn-md btn-dark me-4">OK</a>
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
