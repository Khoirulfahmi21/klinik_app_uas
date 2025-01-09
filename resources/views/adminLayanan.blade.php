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
 
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="card border-0 ">
                                    <div class="card-body">
                                        <a href="/admin/layanan/create" class="btn btn-md btn-dark mb-3"> TAMBAH DATA</a> 
                                        <a href="/admin/layanan" class="btn btn-md btn-dark mb-3"><i class='fa fa-refresh'></i></a>
                                        <table id="layananTable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Nama Layanan</th>
                                                <th scope="col">Harga Layanan</th>
                                               
                                                <th scope="col" style="width: 20%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($layanans as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td> <!-- Nomor otomatis -->
                                                    <td>{{ $row->nama_layanan }}</td>
                                                    <td>{{ "Rp " . number_format($row->harga_layanan,2,',','.') }}</td>
                                                    
                                                    <td class="text-center">
                                                        <form id="delete-form-{{ $row->kode_layanan }}" action="{{ route('layanan.destroy', $row->kode_layanan) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <a href="{{ route('layanan.show', $row->kode_layanan) }}" class="btn btn-sm btn-dark"> <i class='far fa-eye'></i> </a>
                                                        <a href="{{ route('layanan.edit', $row->kode_layanan) }}" class="btn btn-sm btn-dark"> <i class='fas fa-edit'> </i></a>
                                                        <button type="button" class="btn btn-sm btn-dark" onclick="confirmDelete({{ $row->kode_layanan }})"> <i class='fas fa-trash-alt'></i> </button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-danger">
                                                    Data layanan belum Tersedia.
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                        {{ $layanans->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <script>
                    $(document).ready(function() {
                        $('#layananTable').DataTable();
                    });

                </script>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
