@extends('Layout.Layout')

@section('judul','Create Transaksi')


@section('content')
<h2>Form Tambah Transaksi</h2>
<form action="/cobaCreateTransaksi" method="post" class="was-validated">
        {{ csrf_field() }}
<br>
<table border="0">
    <tr>
        <div class="form-group">
        <td><label>Nama Barang 1</label></td>
        <td>:</td>
        <td> 
        <select name="kd_barang" class="form-control" style="width:100%" >
        @foreach ($barang as $barang)
        <option value="{{$barang->kd_barang}}"> {{$barang->nama_barang}}</option>
         @endforeach  
         </select></td>
        </div>
    </tr>
    <tr>
        <div class="form-group">
        <td><label>Quantity 1</label></td>
        <td>:</td>
        <td><input class="form-control" type="text" name ="qty"/></td>
        </div>
    </tr>
    
</table><br>

<table border="0">
    <tr>
        <div class="form-group">
        <td><label>Nama Barang 2</label></td>
        <td>:</td>
        <td> 
        <select name="kd_barang2" class="form-control" style="width:100%" >
        <option value="0"> -- </option>
        @foreach ($barang2 as $barang)
        <option value="{{$barang->kd_barang}}"> {{$barang->nama_barang}}</option>
         @endforeach  
         </select></td>
        </div>
    </tr>
    <tr>
        <div class="form-group">
        <td><label>Quantity 2</label></td>
        <td>:</td>
        <td><input class="form-control" type="text" name ="qty2"/></td>
        </div>
    </tr>
    
</table>


<table border="0">
    <tr>
        <div class="form-group">
        <td><label>Nama Barang 2</label></td>
        <td>:</td>
        <td> 
        <select name="kd_barang3" class="form-control" style="width:100%" >
        <option value="0"> -- </option>
        @foreach ($barang3 as $barang)
        <option value="{{$barang->kd_barang}}"> {{$barang->nama_barang}}</option>
         @endforeach  
         </select></td>
        </div>
    </tr>
    <tr>
        <div class="form-group">
        <td><label>Quantity 3</label></td>
        <td>:</td>
        <td><input class="form-control" type="text" name ="qty3"/></td>
        </div>
    </tr>
    
</table>



<table border="0">
  
    <tr>
        <div class="form-group">
        <td><label>Status Bayar</label></td>
        <td>:</td>
        <td><select name="status_bayar" class="form-control" style="width:50%" >
            <option value="kredit"> Kredit</option>
            <option value="tunai"> Tunai</option>
            </td>
            </div>
    </tr>
    <tr>
        <div class="form-group">
        <td><label>Nama Petugas</label></td>
        <td>:</td>
        <td><input class="form-control" type="text" name ="petugas"/></td>
        </div>
    </tr>
</table>
<div class="for-group">
        <input type="submit" value="submit" class="btn btn-primary"/>
        </div>


@endsection()
