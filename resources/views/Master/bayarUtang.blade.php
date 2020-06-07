@extends('Layout.Layout')

@section('judul','Bayar Utang')


@section('content')
<h2>Form Bayar Utang</h2>

<form action="/addCicilan" method="post" class="was-validated">
{{ csrf_field() }}


<div class="form-group">
<label>Kode utang :</label>@foreach($utang as $u)
<input class="form-control" type="text" name="kd_utang" value="{{$u->kd_utang}}"/>@endforeach
</div>

<div class="form-group">
<label>Tanggal Cicil :</label>
<input class="form-control" type="date" name="tgl_cicil"/>
</div>

<div class="form-group">
<label>Nominal Cicil :</label>
<input class="form-control" type="text" name="nominal"/>
</div>
<div class="for-group">
        <input type="submit" value="submit" class="btn btn-primary"/>
        </div>
</form>



@endsection()