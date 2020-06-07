<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function TampilBarang(){
        $barang = DB::table('barang')->get();
        return view('Master.TampilBarang',['barang' => $barang]);
    }

    public function CreateBarang(){
        return view('Master.CreateBarang');
    }

    public function tambah(Request $request){
        DB::table('barang')->insert([
            'nama_barang'=> $request->namabarang,
            'harga'=> $request->hargabarang,
            'stok'=> $request->stokbarang
        ]);

        return redirect('/TampilBarang');
    }

    public function edit($id){
        $barang = DB::table('barang')->where('kd_barang',$id)->get();
        return view('Master.updateBarang',['barang'=>$barang]);
    }

    public function update(Request $request){
        DB::table('barang')->where('kd_barang',$request->id)->update([
            'nama_barang' => $request->namabarang,
            'harga' => $request->hargabarang,
            'stok' => $request->stokbarang
        ]);

        return redirect('/TampilBarang');
    }

    public function hapus($id){
        DB::table('barang')->where('kd_barang',$id)->delete();
        return redirect('/TampilBarang');
    }
}
