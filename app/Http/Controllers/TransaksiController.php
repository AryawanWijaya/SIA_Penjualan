<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function input(Request $req){
        //$this->hitungHarga($req);
        if($req->status_bayar=='tunai'){
            $this->inputTrans($req);
            $this->inputTransDtl($req);
            $this->inputTransTunai($req);

        }
        else{
            $this->inputTrans($req);
            $this->inputTransDtl($req);
            $this->inputTransPiutang($req);

        }
        return redirect('/CreateTransaksi');
    }

    // private function hitungHarga(Request $req){
    //     $qty=(int)$req->get('qty');
    //     // $qty2=(int)$req->get('qty2');
    //     // $qty3=(int)$req->get('qty3');
    //    $harga= DB::table('barang')->select('harga')->where('kd_barang','=',$req->kd_barang)->get();
    // // $harga1=intval($price1);
    //    //$sub1=$price1*$qty;
    // //    $price2= DB::table('barang')->select('harga' * $req->qty2)->where('kd_barang','=',$req->kd_barang2)->get();
    // //    //$sub2=$price2*$qty2;
    // //    $price3= DB::table('barang')->select('harga' * $req->qty3)->where('kd_barang','=',$req->kd_barang3)->get();
    //    //$sub3=$price3*$qty3;

    //   // $total_harga=$sub1+$sub2+$sub3;
     
    //    return view('Master.CreateTransaksi',['barang'=>$harga]);

    // }

    private function inputTrans(Request $req){
        DB::table('transaksi')->insert([
            'petugas'=>$req->petugas,
            'tgl_transaksi'=>$req->tgl_transaksi,
            'status_bayar'=>$req->status_bayar
        ]);
    }

    private function kdTrans(){
        $kd_trans=DB::table('transaksi')->max('kd_transaksi');
        return $kd_trans;
    }

    private function inputTransDtl(Request $req){
        DB::table('dtl_trans')->insert([
            'kd_transaksi'=>$this->kdTrans(),
            'kd_barang'=>$req->kd_barang,
            'qty'=>$req->qty
        ]);

        DB::table('dtl_trans')->insert([
            'kd_transaksi'=>$this->kdTrans(),
            'kd_barang'=>$req->kd_barang2,
            'qty'=>$req->qty2
        ]);

        DB::table('dtl_trans')->insert([
            'kd_transaksi'=>$this->kdTrans(),
            'kd_barang'=>$req->kd_barang3,
            'qty'=>$req->qty3
        ]);
    }

    private function inputTransTunai(Request $req){
        DB::table('tunai')->insert([
            'kd_transaksi'=>$this->kdTrans(),
            'nominal'=>$req->total_harga,
            'kd_akun_debit'=>'101',
            'kd_akun_kredit'=>'400'
        ]);
    }

    private function inputTransPiutang(Request $req){
        DB::table('utang')->insert([
            'kd_transaksi'=>$this->kdTrans(),
            'nominal'=>$req->total_harga,
            'kd_akun_debit'=>'112',
            'kd_akun_kredit'=>'400'
        ]);
    }

    private function kdUtang(){
        $kd_utang=DB::table('utang')->max('kd_utang');
        return $kd_utang;
    }

    public function inputTransPiutangDtl(Request $req){
        DB::table('dtl_utang')->insert([
            'kd_utang'=>$this->kdUtang(),
            'tgl_cicil'=>$req->tgl_cicil,
            'nominal_cicil'=>$req->nominal_cicil,
            'kd_akun_kredit'=>'101',
            'kd_akun_debit'=>'112'
        ]);
    }

}
