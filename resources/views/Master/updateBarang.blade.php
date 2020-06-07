@extends('Layout.Layout')

@section('judul','Update Barang')


@section('content')
<h2>Form Update Barang</h2>


@foreach($barang as $b)
<br>
<form action="/updateBarang/{{$b->kd_barang}}" method="post" class="was-validated">
    {{ csrf_field() }}

<div class="form-group">
<label>Nama Barang :</label>
<input class="form-control" type="text" name="namabarang" value="{{$b->nama_barang}}"/>
</div>

<div class="form-group">
<label>Harga Barang :</label>
<input class="form-control" name="hargabarang" value="{{$b->harga}}"/>
</div>

<div class="form-group">
<label>Stok Barang :</label>
<input class="form-control" name="stokbarang" value="{{$b->stok}}"/>
</div>
@endforeach
<div class="for-group">
    <input type="submit" value="submit" class="btn btn-primary"/>

@endsection()
