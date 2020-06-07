@extends('Layout.Layout')

@section('judul','Buku Besar')


@section('content')
<h1>Buku Besar </h2>

<div class="row">
    <div class="coll text-right"><p>No. 101</p></div>
    <div class="coll text-center"><h3>Kas</h3></div>
</div>
<table class="table table-stripped" border="1">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Penjelasan</th>
                <th>Ref</th>
                <th>Debit</th>
                <th>Kredit</th>
                
            </tr>
        </thead>

        <tbody>
        @foreach($kas as $kas)
            <tr>
            
                <td>{{$kas->tgl}}</td>
                <td></td>
                <td>J1</td>
                <td>  {{$kas->nominal_debit}}</td>
                <td> {{$kas->nominal_kredit}}</td>
                
            </tr>
        @endforeach
        </tbody>
</table>
<br><br>

<div class="row">
        <div class="coll text-right"><p>No. 112</p></div>
        <div class="coll text-center"><h3>Piutang</h3></div>
    </div>
    <table class="table table-stripped" border="1">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Penjelasan</th>
                    <th>Ref</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                    
                </tr>
            </thead>

            <tbody>
            @foreach($piutang as $piutang)
            <tr>
                <td>{{$piutang->tgl}}</td>
                <td></td>
                <td>J1</td>
                <td>  {{$piutang->nominal_debit}}</td>
                <td> {{$piutang->nominal_kredit}}</td>
                
            </tr>
        @endforeach
            </tbody>
    </table>

<br><br>
    <div class="row">
            <div class="coll text-right"><p>No. 400</p></div>
            <div class="coll text-center"><h3>Pendapatan Penjualan</h3></div>
        </div>
        <table class="table table-stripped" border="1">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Penjelasan</th>
                        <th>Ref</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        
                    </tr>
                </thead>

                <tbody>
                @foreach($pendapatan as $pendapatan)
                 <tr>
                <td>{{$pendapatan->tgl}}</td>
                <td></td>
                <td>J1</td>
                <td>  {{$pendapatan->nominal_debit}}</td>
                <td> {{$pendapatan->nominal_kredit}}</td>
                
                  </tr>
                @endforeach
                </tbody>
        </table>
        <br><br>
        <div class="row">
                <div class="coll text-right"><p>No. 511</p></div>
                <div class="coll text-center"><h3>Beban Gaji</h3></div>
            </div>
            <table class="table table-stripped" border="1">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Penjelasan</th>
                            <th>Ref</th>
                            <th>Debit</th>
                            <th>Kredit</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($gaji as $gaji)
                        <tr>
                        <td>{{$gaji->tgl}}</td>
                        <td></td>
                        <td>J1</td>
                        <td>  {{$gaji->nominal_debit}}</td>
                        <td> {{$gaji->nominal_kredit}}</td>
                       
                         </tr>
                     @endforeach
                    </tbody>
            </table>
            <br><br>
            <div class="row">
                    <div class="coll text-right"><p>No. 512</p></div>
                    <div class="coll text-center"><h3>Beban Listrik,Air,Telp</h3></div>
                </div>
                <table class="table table-stripped" border="1">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Penjelasan</th>
                                <th>Ref</th>
                                <th>Debit</th>
                                <th>Kredit</th>
                               
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($listrik as $listrik)
                        <tr>
                        <td>{{$listrik->tgl}}</td>
                        <td></td>
                        <td>J1</td>
                        <td>  {{$listrik->nominal_debit}}</td>
                        <td> {{$listrik->nominal_kredit}}</td>
                       
                         </tr>
                     @endforeach
                        </tbody>
                </table>
                <br><br>
                <div class="row">
                        <div class="coll text-right"><p>No. 602</p></div>
                        <div class="coll text-center"><h3>Beban Sewa Gedung</h3></div>
                    </div>
                    <table class="table table-stripped" border="1">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Penjelasan</th>
                                    <th>Ref</th>
                                    <th>Debit</th>
                                    <th>Kredit</th>
                                   
                                </tr>
                            </thead>

                            <tbody>
                            @foreach($sewa as $sewa)
                        <tr>
                        <td>{{$sewa->tgl}}</td>
                        <td></td>
                        <td>J1</td>
                        <td>  {{$sewa->nominal_debit}}</td>
                        <td> {{$sewa->nominal_kredit}}</td>
                       
                         </tr>
                         @endforeach
                            </tbody>
                    </table>
@endsection()
