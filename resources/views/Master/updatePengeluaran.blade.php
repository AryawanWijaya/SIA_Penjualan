@extends('Layout.Layout')

@section('judul','Pengeluaran')


@section('content')
<h2>Form Tambah Pengeluaran</h2>
<form action="/updatePengeluaran" method="post" class="was-validated">
        {{ csrf_field() }}
<table border="0">

    <tr>
        <div class="form-group">
            <td><label>Kode Akun</label></td>
            <td>:</td>
           <td> <select name="kd_akun" class="form-control" style="margin-left:5px">
                <option value="">--Pilih Kode Akun--</option>
                @foreach($akun as $a)       
                <option value="{{$a->kd_akun}}"> {{$a->nama_akun}}</option>
                @endforeach     
            </select></td>
        </div>    
    </tr>

    @foreach($pengeluaran as $p)
    <tr>
        <div class="form-group">
            <td><label>Keperluan</label></td>
            <td>:</td>
            <td><input class="form-control" style ="margin-left:5px" type="text" name ="keperluan" value="{{$p->keperluan}}"/></td>
        </div>
    </tr>
    <tr>
    <div class="form-group">
        <td><label>Nominal Keluar</label></td>
        <td>: </td>
        <td><input class="form-control" style="margin-left:5px" type="text" name ="nominal" value="{{$p->nominal}}"/></td>
    </div>
    </tr>
    <tr>
        <div class="form-group">
        <td><label>Tanggal Keluar</label></td>
        <td>: </td>
        <td><input class="form-group" style="margin-left:5px" type="date" name ="tanggal" value="{{$p->tgl_pengeluaran}}"/></td>
    </div>
    </tr>
    <tr>
@endforeach
</table>

<div class="for-group">
    <input type="submit" value="submit" class="btn btn-primary"/>

@endsection()
