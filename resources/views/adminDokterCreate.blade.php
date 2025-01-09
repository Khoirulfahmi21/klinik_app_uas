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
                                        <form action="{{ route('dokter.store') }}" method="POST" enctype="multipart/form-data">
                                        
                                            @csrf

                                        <hr>
                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">NAMA DOKTER</label>
                                                <input type="text" class="form-control @error('nama_dokter') is-invalid @enderror" name="nama_dokter" value="{{ old('nama_dokter') }}" placeholder="Masukkan nama dokter">
                                            
                                                <!-- error message untuk nama_dokter -->
                                                @error('nama_dokter')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">SPESIALISASI</label>
                                                <select name="spesialisasi" class="form-select">
                                                    <option selected>Pilih Spesialisasai Dokter</option>
                                                    <option value="Dokter spesialis bedah">Dokter spesialis bedah</option>
                                                    <option value="Dokter spesialis bedah onkologi">Dokter spesialis bedah onkologi</option>
                                                    <option value="Dokter spesialis bedah ortopedi">Dokter spesialis bedah ortopedi</option>
                                                    <option value="Dokter spesialis bedah saraf">Dokter spesialis bedah saraf</option>
                                                    <option value="Dokter spesialis penyakit dalam">Dokter spesialis penyakit dalam</option>
                                                    <option value="Dokter spesialis gastroenterologi dan hepatologi">Dokter spesialis gastroenterologi dan hepatologi</option>
                                                    <option value="Dokter spesialis alergi dan imunologi">Dokter spesialis alergi dan imunologi</option>
                                                    <option value="Dokter spesialis endokrin">Dokter spesialis endokrin</option>
                                                    <option value="Dokter spesialis ginjal dan hipertensi">Dokter spesialis ginjal dan hipertensi</option>
                                                    <option value="Dokter spesialis jantung dan pembuluh darah">Dokter spesialis jantung dan pembuluh darah</option>
                                                    <option value="Dokter spesialis paru">Dokter spesialis paru</option>
                                                    <option value="Dokter spesialis anak">Dokter spesialis anak</option>
                                                    <option value="Dokter spesialis saraf">Dokter spesialis saraf</option>
                                                    <option value="Dokter spesialis kandungan dan ginekologi">Dokter spesialis kandungan dan ginekologi</option>
                                                    <option value="Dokter spesialis kulit dan kelamin">Dokter spesialis kulit dan kelamin</option>
                                                    <option value="Dokter spesialis andrologi">Dokter spesialis andrologi</option>
                                                    <option value="Dokter spesialis THT">Dokter spesialis THT</option>
                                                    <option value="Dokter spesialis mata">Dokter spesialis mata</option>
                                                    <option value="Psikiater">Psikiater</option>
                                                    <option value="Dokter spesialis bedah mulut">Dokter spesialis bedah mulut</option>
                                                    <option value="Spesialis kedokteran gigi anak">Spesialis kedokteran gigi anak</option>
                                                    <option value="Dokter spesialis ortodonti">Dokter spesialis ortodonti</option>
                                                    <option value="Dokter spesialis penyakit mulut">Dokter spesialis penyakit mulut</option>
                                                    <option value="Dokter spesialis prostodonsia">Dokter spesialis prostodonsia</option>
                                                    <option value="Dokter spesialis periodonsia">Dokter spesialis periodonsia</option>
                                                    <option value="Dokter spesialis kedokteran fisik dan rehabilitasi">Dokter spesialis kedokteran fisik dan rehabilitasi</option>
                                                    <option value="Dokter spesialis gizi">Dokter spesialis gizi</option>
                                                    <option value="Dokter spesialis urologi">Dokter spesialis urologi</option>
                                                    
                                                </select>
                                            
                                                <!-- error message untuk spesialisasi -->
                                                @error('spesialisasi')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">Jadwal Praktik</label>
                                                <select name="jadwal_praktik" class="form-select">
                                                    <option selected>Pilih</option>
                                                    <option value="Senin - Selasa">Senin - Selasa</option>
                                                    <option value="Rabu - Kamis">Rabu - Kamis</option>
                                                    <option value="Jumat - Sabtu">Jumat - Sabtu</option>
                                                    <option value="Minggu - Senin">Minggu - Senin</option>
                                                </select>

                                                      <!-- error message untuk jadwal_praktik -->
                                                      @error('jadwal_praktik')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <hr>


                                                    <div class="modal-footer">
                                                        <a href="/admin/dokter" class="btn btn-md btn-basic me-4">KEMBALI</a>

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
