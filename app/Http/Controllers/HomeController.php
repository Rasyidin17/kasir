<?php
  
namespace App\Http\Controllers;
 
use App\Models\Barang;
use App\Models\Transaksi;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;
  
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        return view('home');
    } 
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        return view('adminHome');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome(): View
    {
        return view('managerHome');
    }
    
    public function dashboard() {
        $counts = DB::table('barangs')->count();
        $distributors = DB::table('distributors')->count();
        $users = DB::table('users')->count();
        $transaksis = DB::table('transaksis')->count();
        return view('dashboard', compact('counts', 'distributors', 'users', 'transaksis'));
    }

    public function grafik1()
    {
        $total_harga = Transaksi::select(DB::raw("CAST(SUM(t_har) as int) as t_har"))
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('t_har');
         
        $bulan = Transaksi::select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');

        return view('dashboard', compact('total_harga', 'bulan'));
    }
    
}