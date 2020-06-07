@extends('Layout.Layout')

@section('judul','Journal')


@section('content')
<h2>Journal </h2>
<table class="table table-stripped" border="1">
<thead>
    <tr>
        <th>Tanggal</th>
        <th>Nama Account</th>
        <th>Ref</th>
        <th>Debit</th>
        <th>Kredit</th>
    </tr>
</thead>

<tbody>

@php $i=0 @endphp

@foreach($jurnal as $jurnal)

@php $i=$i+1 @endphp
    <tr>
        <td>{{$jurnal->tgl}}</td>
        <td>{{$jurnal->akun}}</td>
        <td>@if($i%2==0)
                {{$jurnal->kd_akun_kredit}}
            @else 
                {{$jurnal->kd_akun_debit}}
            @endif
        </td>
        <td>{{$jurnal->nominal_debit}}</td>
        <td>{{$jurnal->nominal_kredit}}</td>
    </tr>
@endforeach
</tbody>
</table>

@endsection()
