<?php

namespace App\Http\Controllers;

//import model 
use App\Models\Ruangan; 

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * INI HALAMAN ruangan BOS KU!
     *
     * @return void
     */
    public function index() : View
    {
        //get all ruangan
        $ruangans = Ruangan::latest()->paginate(10);

        //render view with ruangan
        return view('adminRuangan', compact('ruangans'));
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * INI HALAMAN  CREATE ruangan BOS KU!
     *
     * @return View
     */
    public function create(): View
    {
        return view('adminRuanganCreate');
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
            'nama_ruangan'         => 'required|min:1',
            'desc_ruangan'         => 'required|min:1',
            
        ]);

        //create ruangan
        Ruangan::create([
            'nama_ruangan'         => $request->nama_ruangan,
            'desc_ruangan'         => $request->desc_ruangan,
           
        ]);

        //redirect to index
        return redirect()->to('/admin/ruangan')->with(['success' => 'Data Berhasil Disimpan!']);
    
    }
    
/////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * show
     *
     * @param  mixed $kode_ruangan
     * @return View
     */
    public function show(string $kode_ruangan): View
    {
        //get ruangan by kode_ruangan
        $ruangans = Ruangan::where('kode_ruangan', $kode_ruangan)->firstOrFail();
    
        //render view with product
        return view('adminRuanganShow', compact('ruangans'));
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////

/**
     * edit
     *
     * @param  mixed $kode_ruangan
     * @return View
     */
    public function edit(string $kode_ruangan): View
    {
        //get ruangan by kode_ruangan
        $ruangans = Ruangan::where('kode_ruangan', $kode_ruangan)->firstOrFail();
    
        //render view with ruangan
        return view('adminRuanganEdit', compact('ruangans'));
    }
        

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $kode_ruangan
     * @return RedirectResponse
     */
    public function update(Request $request, $kode_ruangan): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_ruangan'         => 'required|min:1',
            'desc_ruangan'         => 'required|min:1',
            
        ]);

        //get ruangan by kode_ruangan
        $ruangans = Ruangan::where('kode_ruangan', $kode_ruangan)->firstOrFail();

        //update ruangan 
        $ruangans->update([
            'nama_ruangan'         => $request->nama_ruangan,
            'desc_ruangan'         => $request->desc_ruangan,
            
        ]);

        //redirect to index
        return redirect()->to('/admin/ruangan')->with(['success' => 'Data Berhasil Diubah!']);
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * destroy
     *
     * @param  mixed $kode_ruangan
     * @return RedirectResponse
     */
    public function destroy($kode_ruangan): RedirectResponse
    {
        //get ruangan by kode_ruangan
        $ruangans = Ruangan::where('kode_ruangan', $kode_ruangan)->firstOrFail();

        //delete ruangan
        $ruangans->delete();

        //redirect to index
        return redirect()->to('/admin/ruangan')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}