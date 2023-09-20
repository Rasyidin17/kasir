<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Distributor;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View
    {
        if ($request->has('search')) {
            $barangs = Barang::where('nama_barang', 'LIKE', '%' .$request->search. '%')
            ->orWhere('kode_barang', 'LIKE', '%' .$request->search. '%')->paginate(5);
        }else{
            $barangs = Barang::latest()->paginate(5);
        }
        $distributors = Distributor::all();
        return view('barangs.index', compact('barangs', 'distributors'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function generatePdf()
    {
        $barangs = Barang::all();
        $pdf = FacadePdf::loadView('export-pdf', ['barangs' => $barangs]);
        return $pdf->download('barangs' .Carbon::now()->timestamp. '.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $distributors = Distributor::all();
        return view('barangs.create', compact('distributors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $barang = Barang::latest()->first();
        $kodeBarang = "BRG";
        $kodeTahun = date("Y");
        if ($barang == null) {
            $nomorUrut = "0001";
        }else{
            $nomorUrut = substr($barang->kode_barang, 9, 4)+ 1;
            // $nomorUrut = "000" . $nomorUrut;
            $nomorUrut = str_pad($nomorUrut, 4, "0", STR_PAD_LEFT);
        }
        $kode = $kodeBarang . $kodeTahun . $nomorUrut;

        $requestData = $request->validate([
            'nama_barang' => 'required',
            'nama_merek' => 'required',
            'nama_distributors' => 'required',
            'harga_barang' => 'required',
            'harga_beli' => 'required',
            'stok' => 'required',
        ]);
        Barang::create([
            'kode_barang' => $kode,
            'nama_barang' => $request->nama_barang,
            'nama_merek' => $request->nama_merek,
            'nama_distributors' => $request->nama_distributors,
            'harga_barang' => $request->harga_barang,
            'harga_beli' => $request->harga_beli,
            'stok' => $request->stok,
            'tanggal' => Carbon::now(), 
        ]);
        return redirect()->route('barangs.index')
        ->with('success', 'Barang Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang): View
    {
        return view('barangs.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang) : View
    {
        $distributors = Distributor::all();
        return view('barangs.edit', compact('barang', 'distributors'));
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang): RedirectResponse
    {
        $request->validate([
            'nama_barang' => 'required',
            'nama_merek' => 'required',
            'nama_distributors' => 'required',
            'harga_barang' => 'required',
            'harga_beli' => 'required',
            'stok' => 'required',
        ]);
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'nama_merek' => $request->nama_merek,
            'nama_distributors' => $request->nama_distributors,
            'harga_barang' => $request->harga_barang,
            'harga_beli' => $request->harga_beli,
            'stok' => $request->stok,
        ]);
        return redirect()->route('barangs.index')
        ->with('success', 'Barang Edit Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang) : RedirectResponse
    {
        $barang->delete();
        return redirect()->route('barangs.index')
        ->with('success', 'Barang Deleted Successfully');
    }
}
