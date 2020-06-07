@extends('Layout.Layout')

@section('judul','Umur Piutang')


@section('content')
<h2> Umur Piutang</h2>

<table class="table table-stripped">
    <tr>
        <th>Kode Utang</th>
        <th>Kode Transaksi</th>
        <th>Nominal</th>
        <th>Tanggal Jatuh Tempo</th>
        <th>Sisa Hari</th>
        <th>Sisa Utang</th>
        


    </tr>
@foreach($utang as $p)
    <tr>
        <td>{{$p->kd_utang}}</td>
        <td>{{$p->kd_transaksi}}</td>
        <td>{{$p->nominal}}</td>
        <td>{{$p->tgl_jatuh_tempo}}</td>
        <td>{{$p->sisa_hari}}</td>
        <td>{{$p->sisa_utang}}</td>
        <td><a href="/detailPiutang/{{$p->kd_utang}}" class="btn btn-info" role="button">Detail </a></td>
        <td><a href="/bayarPiutang/{{$p->kd_utang}}" class="btn btn-info" role="button">Cicil </a></td>
        
@endforeach




    </tr>
</table>
@endsection()
