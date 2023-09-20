<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Distributor;
use App\Models\Barang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $transaksis = Transaksi::where('kode', 'LIKE', '%' .$request->search. '%')->paginate(5);
        }else{
            $transaksis = Transaksi::latest()->paginate(5);
        }
        $title = 'Delete Transaksi!';
        $text = "Apakah Kamu Yakin Ingin Hapus ?";
        confirmDelete($title, $text);
        return view('transaksis.index', compact('transaksis'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $distributors = Distributor::all();
        $barangs = Barang::all();
        return view('transaksis.create', compact('distributors', 'barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'inputs.*.kode' => 'required',
            'inputs.*.nama' => 'required',
            'inputs.*.harga' => 'required',
            'inputs.*.total' => 'required',
            'inputs.*.t_har' => 'required',
            'inputs.*.t_yar' => 'required',
            'inputs.*.kembalian' => 'required',
            'inputs.*.tng_beli' => 'required',
        ],
        [
            'inputs.*.kode' => 'The Kode field is required',
            'inputs.*.nama' => 'The Name field is required',
            'inputs.*.harga' => 'The Harga field is required',
            'inputs.*.total' => 'The Total field is required',
            'inputs.*.t_har' => 'The Bayar field is required',
            'inputs.*.t_yar' => 'The Bayar field is required',
            'inputs.*.kembalian' => 'The Kembalian field is required',
            'inputs.*.tng_beli' => 'The Tanggal field is required',
        ]
        );
        foreach($request->inputs as $key => $value){
            Transaksi::create($value);
        }
        return redirect()->route('transaksis.index')->with('toast_success', 'Transaksi Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        return view('transaksis.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        return view('transaksis.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'n_rang' => 'required',
            'h_rang' => 'required',
            't_rang' => 'required',
            't_har' => 'required',
            't_yar' => 'required',
            'kembalian' => 'required',
            'tng_beli' => 'required',
        ]);
        $transaksi->update($request->all());
        return redirect()->route('transaksis.index')
        ->with('success', 'Transaksi Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksis.index')
        ->with('toast_success', 'Transaksi Berhasil Di Hapus');
    }

    public function grafik()
    {
        $total_hargas = Transaksi::select(DB::raw("CAST(SUM(t_har) as int) as t_har"))
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('t_har');
         
        // $bulan = Transaksi::select(DB::raw("MONTHNAME(created_at) as bulan"))
        // ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        // ->pluck('bulan');
        $total_harga = Transaksi::select(
            DB::raw("COUNT(*) as count"),
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month")
        )
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        $count_data = null;
        $month_data = null;
        foreach ($total_harga as $count) {
            $count_data[] = $count->count;
            $month_data[] = date('F', strtotime($count->month));
        }
        return view('grafik', compact('count_data', 'month_data', 'total_hargas'));
    }
}
