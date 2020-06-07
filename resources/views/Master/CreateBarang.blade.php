@extends('Layout.Layout')

@section('judul','Create Barang')


@section('content')
<h2>Form Tambah Barang</h2>

<br>
<form action="/addBarang" method="post" class="was-validated">
    {{ csrf_field() }}

<div class="form-group">
<label>Nama Barang :</label>
<input class="form-control" type="text" name="namabarang"/>
</div>

<div class="form-group">
<label>Harga Barang :</label>
<input class="form-control" name="hargabarang"/>
</div>

<div class="form-group">
<label>Stok Barang :</label>
<input class="form-control" name="stokbarang"/>
</div>

<div class="for-group">
    <input type="submit" value="submit" class="btn btn-primary"/>

@endsection()
