<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OutcomeController extends Controller
{
      

    public function read(){
        $pengeluaran = DB::table('pengeluaran')->get();
        return view('Master.TampilPengeluaran',['pengeluaran'=>$pengeluaran]);
    }

    public function edit($id){
        $pengeluaran = DB::table('pengeluaran')->where('kd_pengeluaran',$id)->get();
        return view('Master.updatePengeluaran',['pengeluaran'=>$pengeluaran]);
    }

    public function update(Request $request){
        if($req->kd_akun==101){
            $kredit="126";
            $debit=$req->kd_akun;
        }
        elseif($req->kd_akun==112){
            $kredit="101";
            $debit=$req->kd_akun;
        }
        elseif($req->kd_akun==126){
            $kredit="101";
            $debit=$req->kd_akun;
        }
        elseif($req->kd_akun==201){
            $kredit="101";
            $debit="201";
        }
        elseif($req->kd_akun==400){
            $kredit="400";
            $debit="101";
        }
        elseif($req->kd_akun==511){
            $kredit="101";
            $debit=$req->kd_akun;
        }
        elseif($req->kd_akun==512){
            $kredit="101";
            $debit=$req->kd_akun;
        }
        else{
            $kredit="101";
            $debit=$req->kd_akun;
        }

        DB::table('pengeluaran')->where('kd_pengeluaran',$request->id)->update([
            'keperluan' => $req ->keperluan,
            'nominal_keluar' => $req->nominal,
            'tgl_keluar'=>$req->tanggal,
            'kd_akun_kredit'=>$kredit,
            'kd_akun_debit'=>$debit
        ]);

        return redirect('/TampilPengeluaran');
    }

    public function delete($id){
        DB::table('pengeluaran')->where('kd_pengeluaran',$id)->delete();
        return redirect('/TampilPengeluaran');
    }

    
}
