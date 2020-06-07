@extends('Layout.Layout')

@section('judul','Tampil Pengeluaran')


@section('content')
<h2>Form Tampil Pengeluaran</h2>

<table class="table table-stripped">
    <tr>
        <th>Keperluan</th>
        <th>Nominal Keluar</th>
        <th>Tanggal Keluar</th>
        <th>Kode Debit</th>
        <th>Kode Kredit</th>

    </tr>
@foreach($pengeluaran as $o)
    <tr>
        <td>{{$o->keperluan}}</td>
        <td>{{$o->nominal_keluar}}</td>
        <td>{{$o->tgl_keluar}}</td>
        <td>{{$o->kd_akun_debit}}</td>
        <td>{{$o->kd_akun_kredit}}</td>

    </tr>
@endforeach
</table>
@endsection()
