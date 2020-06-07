@extends('Layout.Layout')

@section('judul','Tampil Barang')


@section('content')
<h2>Form Tampil Barang</h2>

<table class="table table-stripped">
    <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga Barang</th>
        <th>Stok Barang</th>
        <th>Aksi</th>
    </tr>
@foreach($barang as $b)
    <tr>
        <td>{{$b->kd_barang}}</td>
        <td>{{$b->nama_barang}}</td>
        <td>{{$b->harga}}</td>
        <td>{{$b->stok}}</td>
        <td>
            <a href="/editBarang/{{$b->kd_barang}}">Edit</a>
            |
            <a href="delBarang/{{$b->kd_barang}}">Hapus</a>
        </td>
    </tr>
@endforeach
</table>
@endsection('content')
