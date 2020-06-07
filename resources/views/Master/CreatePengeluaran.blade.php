@extends('Layout.Layout')

@section('judul','Pengeluaran')


@section('content')
<h2>Form Tambah Pengeluaran</h2>
<form action="/cobaCreatePengeluaran" method="post" class="was-validated">
        {{ csrf_field() }}
<table border="0">
    <tr>
        <div class="form-group">
            <td><label>Keperluan</label></td>
            <td>:</td>
            <td><select name="keperluan" class="form-control" style="width:100%" >
            <option value="gaji"> Gaji Pegawai</option>
            <option value="listrik_dll"> Biaya Listrik,Air,Tlp</option>
            <option value="gedung"> Biaya sewa gedung</option>
            
            </td>
        </div>
    </tr>
    <tr>
    <div class="form-group">
        <td><label>Nominal Keluar</label></td>
        <td>: </td>
        <td><input class="form-control" type="text" name ="nominal"/></td>
    </div>
    </tr>
    <tr>
        <div class="form-group">
        <td><label>Tanggal Keluar</label></td>
        <td>: </td>
        <td><input class="form-group" type="date" name ="tanggal"/></td>
    </div>
    </tr>
    <tr>

</table>

<div class="for-group">
    <input type="submit" value="submit" class="btn btn-primary"/>

@endsection()
