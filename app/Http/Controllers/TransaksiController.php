<?php

namespace App\Http\Controllers;

//import model 
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Layanan;
use App\Models\Dokter;
use App\Models\Ruangan; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * INI HALAMAN transaksi BOS KU!
     *
     * @return void
     */
    public function index() : View
    {
        //get all transaksi
        $transaksis = Transaksi::with(['user', 'ruangan', 'layanan', 'dokter'])->latest()->paginate(10);
        //render view with transaksi
        return view('adminTransaksi', compact('transaksis'));
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * INI HALAMAN  CREATE ruangan BOS KU!
     *
     * @return View
     */
    public function create(): View
    {
        $users = User::all();
        $layanans = Layanan::all();
        $dokters = Dokter::all();
        $ruangans = Ruangan::all();

              // Mengambil semua pengguna
              $users = User::all();
              $layanans = Layanan::all();
              $dokters = Dokter::all();
              $ruangans = Ruangan::all();
             
              
              // Mengirim data pengguna yang login, semua pengguna, dan semua tujuan ke view
              return view('adminTransaksiCreate', [
                  'users' => $users,
                  'layanans' => $layanans,
                  'dokters' => $dokters,
                  'ruangans' => $ruangans,
                 
              ]);
    }


                public function getHargaLayanan($kode_layanan)
            {
                $layanan = Layanan::where('kode_layanan', $kode_layanan)->first();
                return response()->json(['harga_layanan' => $layanan->harga_layanan]);
            }

    


    /**
     * SIMPAN DATA ruangan
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'id_user'               => 'required|min:1',
            'kode_layanan'          => 'required|min:1',
            'id_dokter'             => 'required|min:1',
            'jadwal_temu'           => 'required|min:1',
            'kode_ruangan'          => 'required|min:1',
            'total_biaya'           => 'required|min:1',
            'status_trx'            => 'required|min:1',
            
        ]);

        //create ruangan
        Transaksi::create([
            'id_user'               => $request->id_user,
            'kode_layanan'          => $request->kode_layanan,
            'id_dokter'             => $request->id_dokter,
            'jadwal_temu'           => $request->jadwal_temu,
            'kode_ruangan'          => $request->kode_ruangan,
            'total_biaya'           => $request->total_biaya,
            'status_trx'            => $request->status_trx,
           
        ]);

        //redirect to index
        return redirect()->to('/admin/transaksi')->with(['success' => 'Data Berhasil Disimpan!']);
    
    }
    
/////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * show
     *
     * @param  mixed $kode_trx
     * @return View
     */
    public function show(string $kode_trx): View
    {
        //get ruangan by kode_trx
        $transaksis = Transaksi::where('kode_trx', $kode_trx)->firstOrFail();
    
        //render view with product
        return view('adminTransaksiShow', compact('transaksis'));
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////

/**
     * edit
     *
     * @param  mixed $kode_trx
     * @return View
     */
    public function edit(string $kode_trx): View
    {
        //get trx by kode_trx
        $transaksis = Transaksi::where('kode_trx', $kode_trx)->firstOrFail();
    
        //render view with ruangan
        return view('adminTransaksiEdit', compact('transaksis'));
    }
        

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $kode_trx
     * @return RedirectResponse
     */
    public function update(Request $request, $kode_trx): RedirectResponse
    {
        //validate form
        $request->validate([
            'id_user'               => 'required|min:1',
            'kode_layanan'          => 'required|min:1',
            'id_dokter'             => 'required|min:1',
            'jadwal_temu'           => 'required|min:1',
            'kode_ruangan'          => 'required|min:1',
            'total_biaya'           => 'required|min:1',
            'status_trx'            => 'required|min:1',
            
        ]);

        //get ruangan by kode_trx
        $transaksis = Transaksi::where('kode_trx', $kode_trx)->firstOrFail();

        //update ruangan 
        $transaksis->update([
            'id_user'               => $request->id_user,
            'kode_layanan'          => $request->kode_layanan,
            'id_dokter'             => $request->id_dokter,
            'jadwal_temu'           => $request->jadwal_temu,
            'kode_ruangan'          => $request->kode_ruangan,
            'total_biaya'           => $request->total_biaya,
            'status_trx'            => $request->status_trx,
            
        ]);

        //redirect to index
        return redirect()->to('/admin/transaksi')->with(['success' => 'Data Berhasil Diubah!']);
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////

/**
     * confirm
     *
     * @param  mixed $kode_trx
     * @return View
     */
    public function confirm(string $kode_trx): View
    {
        //get trx by kode_trx
        $transaksis    = Transaksi::where('kode_trx', $kode_trx)->firstOrFail();
        $users = User::all();
        $layanans = Layanan::all();
        $dokters = Dokter::all();
        $ruangans = Ruangan::all();
    
        // Mengirim data tiket ke view
        return view('adminTransaksiConfirm', compact('transaksis', 'users', 'layanans', 'dokters', 'ruangans'));
    }

    /**
     * cancel
     *
     * @param  mixed $transaksis
     * @return View
     */
    public function cancel(string $kode_trx): View
    {
        //get trx by kode_trx
        $transaksis  = Transaksi::where('kode_trx', $kode_trx)->firstOrFail();
        $users = User::all();
        $layanans = Layanan::all();
        $dokters = Dokter::all();
        $ruangans = Ruangan::all();
    
        // Mengirim data tiket ke view
        return view('adminTransaksiCancel', compact('transaksis', 'users', 'layanans', 'dokters', 'ruangans'));
    }

}