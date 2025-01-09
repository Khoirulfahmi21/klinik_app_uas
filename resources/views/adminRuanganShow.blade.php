@extends('layouts.admin_app')
 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header bg-dark text-light">{{ __('HALAMAN RUANGAN') }}</div>

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
                                                        <label class="font-weight-bold">KODE RUANGAN</label>
                                                        <input type="text" class="form-control @error('kode_ruangan') is-invalid @enderror" name="kode_ruangan" value="{{ old('kode_ruangan', $ruangans->kode_ruangan) }}" readonly>
                                                    
                                                        <!-- error message untuk kode_ruangan -->
                                                        @error('kode_ruangan')
                                                            <div class="alert alert-danger mt-2">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="font-weight-bold">NAMA RUANGAN</label>
                                                        <input type="text" class="form-control @error('nama_ruangan') is-invalid @enderror" name="nama_ruangan" value="{{ old('nama_ruangan', $ruangans->nama_ruangan) }}" readonly>
                                                    
                                                        <!-- error message untuk nama_ruangan -->
                                                        @error('nama_ruangan')
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
                                                            <label class="font-weight-bold">DESKRIPSI</label>
                                                            <input type="text" class="form-control @error('desc_ruangan') is-invalid @enderror" name="desc_ruangan" value="{{ old('desc_ruangan', $ruangans->desc_ruangan) }}" readonly>
                                                        
                                                            <!-- error message untuk desc_ruangan -->
                                                            @error('desc_ruangan')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                </div>  


                                                    <div class="modal-footer">
                                                        <a href="/admin/ruangan" class="btn btn-md btn-basic me-4">KEMBALI</a>

                                                        <div class="btn-group">
                                                            <a href="/admin/ruangan" class="btn btn-md btn-dark me-4">OK</a>
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
