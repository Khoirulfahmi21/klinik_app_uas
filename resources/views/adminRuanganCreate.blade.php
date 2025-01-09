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
                                        <form action="{{ route('ruangan.store') }}" method="POST" enctype="multipart/form-data">
                                        
                                            @csrf

                                        <hr>
                                        
                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">NAMA RUANGAN</label>
                                                <input type="text" class="form-control @error('nama_ruangan') is-invalid @enderror" name="nama_ruangan" value="{{ old('nama_ruangan') }}" placeholder="Masukkan nama ruangan">
                                            
                                                <!-- error message untuk nama_ruangan -->
                                                @error('nama_ruangan')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">DESKRIPSI</label>
                                                <textarea class="form-control @error('desc_ruangan') is-invalid @enderror" name="desc_ruangan" rows="5" placeholder="Masukkan deskripsi ruangan">{{ old('desc_ruangan') }}</textarea>
                                            
                                                <!-- error message untuk desc_ruangan -->
                                                @error('desc_ruangan')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <hr>

                                                    <div class="modal-footer">
                                                        <a href="/admin/ruangan" class="btn btn-md btn-basic me-4">KEMBALI</a>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>



                </div>
            </div>
        </div>
    </div>
</div>



@endsection
