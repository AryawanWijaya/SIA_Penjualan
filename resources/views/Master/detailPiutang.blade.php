@extends('Layout.Layout')

@section('judul','Detail Piutang')


@section('content')
<a href="/UmurPiutang" class="btn btn-info" role="button">Kembali </a>
<h2>Detail Piutang</h2>
<table class="table table-stripped">
    <tr>
        <th>Kode Detail Utang</th>
        <th>Kode Utang</th>
        <th>Tgl Cicil</th>
        <th>Nominal Cicil</th>
        


    </tr>
@foreach($utang as $u)
    <tr>
        <td>{{$u->kd_dtl_utang}}</td>
        <td>{{$u->kd_utang}}</td>
        <td>{{$u->tgl_cicil}}</td>
        <td>{{$u->Nominal_cicil}}</td>
        
        @endforeach

    </tr>
</table>


@endsection()
