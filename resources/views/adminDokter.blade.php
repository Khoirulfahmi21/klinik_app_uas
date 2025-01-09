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
 
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="card border-0 ">
                                    <div class="card-body">
                                        <a href="/admin/dokter/create" class="btn btn-md btn-dark mb-3"> TAMBAH DATA</a> 
                                        <a href="/admin/dokter" class="btn btn-md btn-dark mb-3"><i class='fa fa-refresh'></i></a>
                                        <table id="dokterTable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Nama Dokter</th>
                                                <th scope="col">Spesialisasi</th>
                                                <th scope="col">Jadwal Praktik</th>
                                                <th scope="col" style="width: 20%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($dokters as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td> <!-- Nomor otomatis -->
                                                    <td>{{ $row->nama_dokter }}</td>
                                                    <td>{{ $row->spesialisasi }}</td>
                                                    <td>{{ $row->jadwal_praktik }}</td>
                                                    <td class="text-center">
                                                        <form id="delete-form-{{ $row->id_dokter }}" action="{{ route('dokter.destroy', $row->id_dokter) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <a href="{{ route('dokter.show', $row->id_dokter) }}" class="btn btn-sm btn-dark"> <i class='far fa-eye'></i> </a>
                                                        <a href="{{ route('dokter.edit', $row->id_dokter) }}" class="btn btn-sm btn-dark"> <i class='fas fa-edit'> </i></a>
                                                        <button type="button" class="btn btn-sm btn-dark" onclick="confirmDelete({{ $row->id_dokter }})"> <i class='fas fa-trash-alt'></i> </button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-danger">
                                                    Data dokter belum Tersedia.
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                        {{ $dokters->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <script>
                    $(document).ready(function() {
                        $('#dokterTable').DataTable();
                    });

                </script>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
