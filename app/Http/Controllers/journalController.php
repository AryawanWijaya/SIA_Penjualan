<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Carbon\Carbon;
class journalController extends Controller
{
    public function vCreateBarang()
    {
        $barang = DB::table('barang')->get();
        return View('Master.CreateTransaksi',array('barang'=>$barang,'barang2'=>$barang,'barang3'=>$barang));
    }

    public function insertTransaksi(Request $req)
    {
        $this->insertTransJournal($req);

        return redirect('/CreateTransaksi');
    }

    private function hitungHarga(Request $req){
        if($req->input('kd_barang2')!=0 && $req->input('kd_barang3')!=0)
        {
            $kode=$req->input('kd_barang');
            $harga=DB::table('barang')->select('harga')->where('kd_barang',$kode)->value('harga');
            $total1=$harga*$req->input('qty');

            $kode2=$req->input('kd_barang2');
            $harga2=DB::table('barang')->select('harga')->where('kd_barang',$kode2)->value('harga');
            $total2=$harga2*$req->input('qty2');

            $kode3=$req->input('kd_barang3');
            $harga3=DB::table('barang')->select('harga')->where('kd_barang',$kode3)->value('harga');
            $total3=$harga3*$req->input('qty3');
            $totalAll=$total1+$total2+$total3;
            return $totalAll;
            // print_r($totalAll);exit;
        }else if($req->input('kd_barang2')!=0 && $req->input('kd_barang3')==0){
            $kode=$req->input('kd_barang');
            $harga=DB::table('barang')->select('harga')->where('kd_barang',$kode)->value('harga');
            $total1=$harga*$req->input('qty');

            $kode2=$req->input('kd_barang2');
            $harga2=DB::table('barang')->select('harga')->where('kd_barang',$kode2)->value('harga');
            $total2=$harga2*$req->input('qty2');

            $totalAll=$total1+$total2;
            return $totalAll;
            // print_r($totalAll);exit;

        }else{
            $kode = $req->input('kd_barang');
            // print_r($kode);exit;
                $harga=DB::table('barang')->select('harga')->where('kd_barang',$kode)->value('harga');
            // print_r($harga);exit;
                $totalAll=$harga*$req->input('qty');
            return $totalAll;
        }
    }

    public function stok($kd_barang, $qty)
    {
        $jumlahBarang= DB::table('barang')->select('stok')->where('kd_barang',$kd_barang)->value('stok');
            // print_r($jumlahBarang);exit;
            $qtyBeli = $qty;
            $stok = $jumlahBarang-$qtyBeli;
            // print_r($stok);exit;
            DB::table('barang')->where('kd_barang',$kd_barang)->update(['stok'=>$stok]);    
            
    }

    private function insertTransJournal(Request $req){        
        $today=Carbon::now();
        if($req->input('status_bayar')=='tunai')
        {
            DB::table('journal')->insert([
                ['tgl'=> $today,'akun'=>'Kas','nominal_debit'=>$this->hitungHarga($req)*95/100, 'nominal_kredit' => 0,'kd_akun_debit'=>'101','kd_akun_kredit'=>'0'],
                ['tgl'=> $today,'akun'=>'Pendapatan','nominal_debit'=>0, 'nominal_kredit' => $this->hitungHarga($req)*95/100,'kd_akun_debit'=>'0','kd_akun_kredit'=>'400']
            ]);

            $this->inputTrans($req);
            $this->inputTransDtl($req);
            $this->inputTransTunai($req);

        }else{
            DB::table('journal')->insert([
                ['tgl'=> $today,'akun'=>'Piutang','nominal_debit'=>$this->hitungHarga($req), 'nominal_kredit' => 0,'kd_akun_debit'=>'112','kd_akun_kredit'=>'0'],
                ['tgl'=> $today,'akun'=>'Pendapatan','nominal_debit'=>0, 'nominal_kredit' => $this->hitungHarga($req),'kd_akun_debit'=>'0','kd_akun_kredit'=>'400']
            ]);

            $this->inputTrans($req);
            $this->inputTransDtl($req);
            $this->inputTransPiutang($req);
        }
    }

    private function inputTrans(Request $req){
        $today=Carbon::now();
        DB::table('transaksi')->insert([
            'petugas'=>$req->petugas,
            'tgl_transaksi'=>$today,
            'status_bayar'=>$req->status_bayar
        ]);
    }

    private function kdTrans(){
        $kd_trans=DB::table('transaksi')->max('kd_transaksi');
        return $kd_trans;
    }

 
     private function inputTransDtl(Request $req){


        if($req->input('kd_barang2')!=0 && $req->input('kd_barang3')!=0)
        {
            DB::table('dtl_trans')->insert([
                'kd_transaksi'=>$this->kdTrans(),
                'kd_barang'=>$req->kd_barang,
                'qty'=>$req->qty
            ]);
            $this->stok($req->kd_barang,$req->qty);
    
            DB::table('dtl_trans')->insert([
                'kd_transaksi'=>$this->kdTrans(),
                'kd_barang'=>$req->kd_barang2,
                'qty'=>$req->qty2
            ]);
            $this->stok($req->kd_barang2,$req->qty2);
    
            DB::table('dtl_trans')->insert([
                'kd_transaksi'=>$this->kdTrans(),
                'kd_barang'=>$req->kd_barang3,
                'qty'=>$req->qty3
            ]);
            $this->stok($req->kd_barang3,$req->qty3);
            
        }else if($req->input('kd_barang2')!=0 && $req->input('kd_barang3')==0){
            DB::table('dtl_trans')->insert([
                'kd_transaksi'=>$this->kdTrans(),
                'kd_barang'=>$req->kd_barang,
                'qty'=>$req->qty
            ]);
            $this->stok($req->kd_barang,$req->qty);

            DB::table('dtl_trans')->insert([
                'kd_transaksi'=>$this->kdTrans(),
                'kd_barang'=>$req->kd_barang2,
                'qty'=>$req->qty2
            ]);
            $this->stok($req->kd_barang,$req->qty);

        }else{
            DB::table('dtl_trans')->insert([
                'kd_transaksi'=>$this->kdTrans(),
                'kd_barang'=>$req->kd_barang,
                'qty'=>$req->qty
            ]);
            $this->stok($req->kd_barang,$req->qty);
        }


        
    }

    private function inputTransTunai(Request $req){
        DB::table('tunai')->insert([
            'kd_transaksi'=>$this->kdTrans(),
            'nominal'=>$this->hitungHarga($req),
            'kd_akun_debit'=>'101',
            'kd_akun_kredit'=>'400'
        ]);
    }

    private function tglTempo(){
        
        $tglJatuh=Carbon::now()->addDay(30);

        return $tglJatuh;
    }

    private function inputTransPiutang(Request $req){
        DB::table('utang')->insert([
            'kd_transaksi'=>$this->kdTrans(),
            'nominal'=>$this->hitungHarga($req),
            'tgl_jatuh_tempo'=>$this->tglTempo(),
            'sisa_utang'=>$this->hitungHarga($req),
            'sisa_hari'=>30,
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

    public function insertPengeluaran(Request $req)
    {
        if($req->input('keperluan')=='gaji'){
            DB::table('journal')->insert([
                ['tgl'=> $req->input('tanggal'),'akun'=>'Beban Gaji','nominal_debit'=>$req->input('nominal'), 'nominal_kredit' => 0,'kd_akun_debit'=>'511','kd_akun_kredit'=>'0'],
                ['tgl'=> $req->input('tanggal'),'akun'=>'Kas','nominal_debit'=>0, 'nominal_kredit' =>$req->input('nominal'),'kd_akun_debit'=>'0','kd_akun_kredit'=>'101']
            ]);
        }elseif($req->input('keperluan')=='gedung'){
            DB::table('journal')->insert([
                ['tgl'=> $req->input('tanggal'),'akun'=>'Beban Sewa Gedung','nominal_debit'=>$req->input('nominal'), 'nominal_kredit' => 0,'kd_akun_debit'=>'602','kd_akun_kredit'=>'0'],
                ['tgl'=> $req->input('tanggal'),'akun'=>'Kas','nominal_debit'=>0, 'nominal_kredit' =>$req->input('nominal'),'kd_akun_debit'=>'0','kd_akun_kredit'=>'101']
            ]);
        }else{
            DB::table('journal')->insert([
                ['tgl'=> $req->input('tanggal'),'akun'=>'Beban Listrik,air,tlp','nominal_debit'=>$req->input('nominal'), 'nominal_kredit' => 0,'kd_akun_debit'=>'512','kd_akun_kredit'=>'0'],
                ['tgl'=> $req->input('tanggal'),'akun'=>'Kas','nominal_debit'=>0, 'nominal_kredit' =>$req->input('nominal'),'kd_akun_debit'=>'0','kd_akun_kredit'=>'101']
            ]);
        }

        $this->input($req);

        return redirect('/CreatePengeluaran');
    }


    private function input(Request $req){
        if($req->input('keperluan')=='gaji'){
            $kredit="101";
            $debit="511";
        }
        elseif($req->input('keperluan')=='gedung'){
            $kredit="101";
            $debit="602";
        }
        else{
            $kredit="101";
            $debit="512";
        }    
        
        DB::table('pengeluaran')->insert([
            'keperluan' => $req ->keperluan,
            'nominal_keluar' => $req->nominal,
            'tgl_keluar'=>$req->tanggal,
            'kd_akun_kredit'=>$kredit,
            'kd_akun_debit'=>$debit
        ]);        
    }


    public function showJournal(){
        $jurnal = DB::table('journal')->get();
        $hitung = DB::table('journal')->count();
        // print_r($hitung);exit;

        return View('Master.Journal',array('jurnal'=>$jurnal,'hitung'=>$hitung));
    }

    public function bukuBesar(){
        $kas = DB::table('journal')->where('kd_akun_debit',101)->orWhere('kd_akun_kredit',101)->distinct()->get();
        // print_r($kas);exit;
        $piutang = DB::table('journal')->where('kd_akun_debit',112)->orWhere('kd_akun_kredit',112)->distinct()->get();
        // print_r($piutang);exit;
        $pendapatan = DB::table('journal')->where('kd_akun_debit',400)->orWhere('kd_akun_kredit',400)->distinct()->get();
        // print_r($piPendapatanutang);exit;
        $gaji = DB::table('journal')->where('kd_akun_debit',511)->orWhere('kd_akun_kredit',511)->distinct()->get();
        $listrik = DB::table('journal')->where('kd_akun_debit',512)->orWhere('kd_akun_kredit',512)->distinct()->get();
        $sewa = DB::table('journal')->where('kd_akun_debit',602)->orWhere('kd_akun_kredit',602)->distinct()->get();
        return View('Master.BukuBesar',array('kas'=>$kas,'piutang'=>$piutang,'pendapatan'=>$pendapatan,
        'gaji'=>$gaji,'listrik'=>$listrik,'sewa'=>$sewa));
    }


    public function laporanLabaRugi(){
        $pendapatan = DB::table('journal')->where('kd_akun_kredit',400)->sum('nominal_kredit');
        // print_r($pendapatan);exit;
        $gaji = DB::table('journal')->where('kd_akun_debit',511)->sum('nominal_debit');
        // print_r($gaji);exit;
        $listrik = DB::table('journal')->where('kd_akun_debit',512)->sum('nominal_debit');
        // print_r($listrik);exit;
        $sewa = DB::table('journal')->where('kd_akun_debit',602)->sum('nominal_debit');
        // print_r($sewa);exit;
        $bebanTotal = $gaji+$listrik+$sewa;
        // print_r($beban);exit;
        $netIncome= $pendapatan-$bebanTotal;
        if($netIncome>0){
            $pajak=$netIncome*15/100;
        }else{
            $pajak=0;
        }

        $netIncome2=$netIncome-$pajak;
        return View('Master.LaporanLabaRugi',array('pendapatan'=>$pendapatan,'gaji'=>$gaji,'listrik'=>$listrik,
        'sewa'=>$sewa,'beban'=>$bebanTotal,'netIncome'=>$netIncome,'pajak'=>$pajak,'netIncome2'=>$netIncome2));
    }
}
