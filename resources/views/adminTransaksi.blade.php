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
 
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="card border-0 ">
                                    <div class="card-body">
                                        <a href="/admin/transaksi/create" class="btn btn-md btn-dark mb-3"> TAMBAH DATA</a> 
                                        <a href="/admin/transaksi" class="btn btn-md btn-dark mb-3"><i class='fa fa-refresh'></i></a>
                                        <table id="transaksiTable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">User</th>
                                                <th scope="col">Layanan</th>
                                                <th scope="col">Dokter</th>
                                                <th scope="col">Jadwal Temu</th>
                                                <th scope="col">Status</th>
            
                                                <th scope="col" style="width: 20%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($transaksis as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td> <!-- Nomor otomatis -->
                                                    <td>{{ $row->id_user }}</td>
                                                    <td>{{ $row->kode_layanan }}</td>
                                                    <td>{{ $row->id_dokter }}</td>
                                                    <td>{{ $row->jadwal_temu }}</td>
                                                    <td>{{ $row->status_trx }}</td>
                                                    
                                                    <td class="text-center">

                                                        
                                                       
                                                        @if ($row->status_trx == 'Menunggu Konfirmasi')
                                                            <a href="{{ route('transaksi.show', $row->kode_trx) }}" class="btn btn-sm btn-dark"> <i class='far fa-eye'></i> </a>
                                                            <a href="{{ route('transaksi.confirm', $row->kode_trx) }}" class="btn btn-sm btn-dark"> <i class='far fa-check-circle'> </i></a>
                                                            <a href="{{ route('transaksi.cancel', $row->kode_trx) }}" class="btn btn-sm btn-dark"> <i class='far fa-times-circle'> </i></a>
                                                        @else
                                                        <a href="{{ route('transaksi.show', $row->kode_trx) }}" class="btn btn-sm btn-dark"> <i class='far fa-eye'></i> </a>

                                                        @endif



                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-danger">
                                                    Data transaksi belum Tersedia.
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                        {{ $transaksis->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <script>
                    $(document).ready(function() {
                        $('#transaksiTable').DataTable();
                    });

                </script>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
