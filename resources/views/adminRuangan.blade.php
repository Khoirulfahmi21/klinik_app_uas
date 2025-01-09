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
 
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="card border-0 ">
                                    <div class="card-body">
                                        <a href="/admin/ruangan/create" class="btn btn-md btn-dark mb-3"> TAMBAH DATA</a> 
                                        <a href="/admin/ruangan" class="btn btn-md btn-dark mb-3"><i class='fa fa-refresh'></i></a>
                                        <table id="ruanganTable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Nama Ruangan</th>
                                                <th scope="col">Deskripsi</th>
                                               
                                                <th scope="col" style="width: 20%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($ruangans as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td> <!-- Nomor otomatis -->
                                                    <td>{{ $row->nama_ruangan }}</td>
                                                    <td>{{ $row->desc_ruangan }}</td>
                                                    
                                                    <td class="text-center">
                                                        <form id="delete-form-{{ $row->kode_ruangan }}" action="{{ route('ruangan.destroy', $row->kode_ruangan) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <a href="{{ route('ruangan.show', $row->kode_ruangan) }}" class="btn btn-sm btn-dark"> <i class='far fa-eye'></i> </a>
                                                        <a href="{{ route('ruangan.edit', $row->kode_ruangan) }}" class="btn btn-sm btn-dark"> <i class='fas fa-edit'> </i></a>
                                                        <button type="button" class="btn btn-sm btn-dark" onclick="confirmDelete({{ $row->kode_ruangan }})"> <i class='fas fa-trash-alt'></i> </button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-danger">
                                                    Data ruangan belum Tersedia.
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                        {{ $ruangans->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <script>
                    $(document).ready(function() {
                        $('#ruanganTable').DataTable();
                    });

                </script>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
