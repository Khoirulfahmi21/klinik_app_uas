<?php

namespace App\Http\Controllers;

//import model 
use App\Models\Dokter; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * INI HALAMAN dokters BOS KU!
     *
     * @return void
     */
    public function index() : View
    {
        //get all dokters
        $dokters = Dokter::latest()->paginate(10);

        //render view with dokters
        return view('adminDokter', compact('dokters'));
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * INI HALAMAN  CREATE dokters BOS KU!
     *
     * @return View
     */
    public function create(): View
    {
        return view('adminDokterCreate');
    }

    /**
     * SIMPAN DATA dokters
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_dokter'         => 'required|min:1',
            'spesialisasi'         => 'required|min:1',
            'jadwal_praktik'        => 'required|min:1'
            
        ]);

        //create product
        Dokter::create([
            'nama_dokter'         => $request->nama_dokter,
            'spesialisasi'         => $request->spesialisasi,
            'jadwal_praktik'        => $request->jadwal_praktik,
           
        ]);

        //redirect to index
        return redirect()->to('/admin/dokter')->with(['success' => 'Data Berhasil Disimpan!']);
    
    }
    
/////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * show
     *
     * @param  mixed $id_dokter
     * @return View
     */
    public function show(string $id_dokter): View
    {
        //get dokter by id_dokter
        $dokters = Dokter::where('id_dokter', $id_dokter)->firstOrFail();
    
        //render view with product
        return view('adminDokterShow', compact('dokters'));
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////

 
/**
     * edit
     *
     * @param  mixed $id_dokter
     * @return View
     */
    public function edit(string $id_dokter): View
    {
        //get dokter by id_dokter
        $dokters = Dokter::where('id_dokter', $id_dokter)->firstOrFail();
    
        //render view with dokter
        return view('adminDokterEdit', compact('dokters'));
    }
        

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id_dokter
     * @return RedirectResponse
     */
    public function update(Request $request, $id_dokter): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_dokter'         => 'required|min:1',
            'spesialisasi'         => 'required|min:1',
            'jadwal_praktik'        => 'required|min:1'
        ]);

        //get dokter by id_dokter
        $dokters = Dokter::where('id_dokter', $id_dokter)->firstOrFail();

        //update dokter 
        $dokters->update([
            'nama_dokter'         => $request->nama_dokter,
            'spesialisasi'         => $request->spesialisasi,
            'jadwal_praktik'        => $request->jadwal_praktik,
        ]);

        //redirect to index
        return redirect()->to('/admin/dokter')->with(['success' => 'Data Berhasil Diubah!']);
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * destroy
     *
     * @param  mixed $id_dokter
     * @return RedirectResponse
     */
    public function destroy($id_dokter): RedirectResponse
    {
        //get dokter by id_dokter
        $dokters = Dokter::where('id_dokter', $id_dokter)->firstOrFail();

        //delete dokter
        $dokters->delete();

        //redirect to index
        return redirect()->to('/admin/dokter')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}