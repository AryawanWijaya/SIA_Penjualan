<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PiutangController extends Controller
{
    public function detail($id){
        $utang = DB::table('dtl_utang')->where('kd_utang',$id)->get();
        return view('Master.detailpiutang',['utang'=>$utang]);
    }

    public function cicil($id){
        // print_r($id);exit;
        $utang = DB::table('utang')->where('kd_utang',$id)->get();
        // print_r($utang);exit;
        return view('Master.bayarUtang',['utang'=>$utang]);
    }

    public function read(){
        $utang=DB::table('utang')->get();
        return view('Master.bayarUtang',['utang'=>$utang]);
    }

    public function input(Request $req){
        DB::table('dtl_utang')->insert([
            'kd_utang' =>$req->kd_utang,
            'tgl_cicil'=>$req->tgl_cicil,
            'Nominal_cicil'=>$req->nominal,
            'kd_akun_debit'=>'101',
            'kd_akun_kredit'=>'112'
        ]);

        $hari=DB::table('utang')->select('sisa_hari')->where('kd_utang',$req->input('kd_utang'))->value('sisa_hari');
        $hutang=DB::table('utang')->select('nominal')->where('kd_utang',$req->input('kd_utang'))->value('nominal');
        // print_r($hutang);exit;
        $cicilan=DB::table('dtl_utang')->select(DB::raw("SUM(Nominal_cicil) as cicilan"))->where('kd_utang',$req->kd_utang)->value('cicilan');
        // print_r($cicilan);exit;
        if($hari>=20 && $cicilan==$hutang)
        {
            DB::table('journal')->insert([
                ['tgl'=> $req->input('tgl_cicil'),'akun'=>'Kas','nominal_debit'=>$req->input('nominal')*95/100, 'nominal_kredit' => 0,'kd_akun_debit'=>'101','kd_akun_kredit'=>'0'],
                ['tgl'=> $req->input('tgl_cicil'),'akun'=>'Piutang','nominal_debit'=>0, 'nominal_kredit' => $req->input('nominal')*95/100,'kd_akun_debit'=>'0','kd_akun_kredit'=>'112']
            ]);
        }else {
            DB::table('journal')->insert([
                ['tgl'=> $req->input('tgl_cicil'),'akun'=>'Kas','nominal_debit'=>$req->input('nominal'), 'nominal_kredit' => 0,'kd_akun_debit'=>'101','kd_akun_kredit'=>'0'],
                ['tgl'=> $req->input('tgl_cicil'),'akun'=>'Piutang','nominal_debit'=>0, 'nominal_kredit' => $req->input('nominal'),'kd_akun_debit'=>'0','kd_akun_kredit'=>'112']
            ]);
        }


            $this->sisaUtang($req);
            $this->sisaHari($req);


        return redirect('/UmurPiutang');
    }

    private function sisaUtang(Request $req){
        $utang2= DB::table('utang')->get();      
        $utang=DB::table('utang')->select('nominal')->where('kd_utang',$req->kd_utang)->value('nominal');        
        $cicilan=DB::table('dtl_utang')->select(DB::raw("SUM(Nominal_cicil) as cicilan"))->where('kd_utang',$req->kd_utang)->value('cicilan');
        $sisa=$utang-$cicilan;

        DB::table('utang')->where('kd_utang',$req->kd_utang)->update([
            'sisa_utang' =>$sisa     
        ]);
        // print_r($sisa);exit;
        
    }

    public function sisaHari(Request $req){
        $tempo=DB::table('utang')->select('tgl_jatuh_tempo')->where('kd_utang',$req->kd_utang)->value('tgl_jatuh_tempo');
        $interval = Carbon::parse(Carbon::now())->diffInDays($tempo);
        
        DB::table('utang')->where('kd_utang',$req->kd_utang)->update([
            'sisa_hari' =>$interval     
        ]);
        // print_r($interval);exit;
    }
}
