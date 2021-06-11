
@extends('layouts.app')

@section('content')

<div class="container  center-block">




<h1 class="text-center">Ordenes de trabajo sistemas</h1>

<form  enctype="multipart/form-data" action="{{route('newticket')}}" method="POST" class="col-md-12 center-block">
@csrf
@method('POST')
<label for="user">Quien lo solicita</label>
<br>
<input name="user" class="col-md-12 center-block" type="text" value="{{auth()->user()->name}} " readonly>
<br>
<label for="dpto">departamento</label>
<br>
<input name="dpto" class="col-md-12 center-block" type="text" value="{{auth()->user()->dpto}} " readonly>
<br>
<br>
<label for="dpto">Imagen del error o de accion a tomar</label>
<br>
<input  type="file"  name="upload_file" capture="camera">
<br>

<label for="task">Trabajo a realizar</label>
<br>
<textarea class="col-md-12 center-block" name="task" id="" cols="60" rows="10"></textarea>
<br>
<label for="fecha">¿ Para cuando te interesa que de realice el trabajo ?</label>
<br>
<input class="col-md-12 center-block" type="datetime-local" name="date" id="">
<br><br>
<button class="bg-success col-md-12 center-block">Generar Orden</button>






</form>







</div>
    <!--Tabla indicadores-->
 
@endsection


