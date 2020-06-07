@extends('Layout.Layout')

@section('judul','Laporan Laba Rugi')


@section('content')

<h1>Laporan Laba Rugi</h1>
<table class="table">
    <thead>
        <tr>
            <th colspan="3" class="text-center">Laporan Laba Rugi</th>
        </tr>
    </thead>
    <tbody>
        <tr class="table-secondary">
            <td> <p class="lead font-weight-bold">Revenues </p></td>
            <td></td>
            <td></td>
        </tr>
        <tr class="table-secondary">
            <td>Pendapatan </td>
            <td>---</td>
            <td>{{$pendapatan}}</td>
        </tr>

        <tr class="table-success">
            <td> <p class="lead font-weight-bold">Expense </p> </td>
            <td></td>
            <td></td>
        </tr>
        <tr class="table-success">
            <td> Beban Gaji Pegawai </td>
            <td>{{$gaji}}</td>
            <td>---</td>
        </tr>
        <tr class="table-success">
            <td> Beban listrik,air,telp </td>
            <td>{{$listrik}}</td>
            <td>---</td>
        </tr>
        <tr class="table-success">
            <td> Beban sewa gedung </td>
            <td>{{$sewa}}</td>
            <td>---</td>
        </tr>
        <tr class="table-success">
            <td> Total Beban</td>
            <td>{{$beban}}</td>
            <td>---</td>
        </tr>

        <tr class="table-danger">
            <td>Net Income</td>
            <td></td>
            <td>{{$netIncome}}</td>
        </tr>

        <tr class="table-danger">
            <td>Pajak (15%)</td>
            <td></td>
            <td>{{$pajak}}</td>
        </tr>

        <tr class="table-danger">
            <td>Net Income Akhir</td>
            <td></td>
            <td>{{$netIncome2}}</td>
        </tr>
    </tbody>
</table>
@endsection()
