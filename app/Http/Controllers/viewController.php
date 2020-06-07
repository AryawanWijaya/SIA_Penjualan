<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class viewController extends Controller
{
    public function createBarang()
    {
        return view('Master.CreateBarang');
    }

    public function TampilBarang()
    {
        return view ('Master.TampilBarang');
    }

    public function CreatePengeluaran()
    {
        $akun = DB::table('akun')->get();
        return view('Master.CreatePengeluaran',['akun'=>$akun]);
    }


    public function TampilPengeluaran()
    {
        return view ('Master.TampilPengeluaran');
    }

    public function CreateTransaksi()
    {
        $barang=DB::table('barang')->get();
        return view('Master.CreateTransaksi',['barang'=>$barang]);
    }

    public function journal()
    {
        return view('Master.Journal');
    }

    public function bukuBesar()
    {
        return view('Master.BukuBesar');
    }

    public function laporanLabaRugi()
    {
        return view('Master.LaporanLabaRugi');
    }

    public function umurPiutang(){
         $utang= DB::table('utang')->get();
         return view('Master.Umurpiutang',['utang'=>$utang]);
         
    }
    public function bayarPiutang(){
        $utang= DB::table('utang')->get();
        return view('Master.bayarUtang',['utang'=>$utang]);
    }

    public function detailPiutang(){
        return view('Master.detailPiutang');
    }

}
