<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orden
    </title>

<style>
.conte1
{
    width: 1000px;
    height: 300px;
    margin: 0px auto;
    text-align: center;
    border-style: solid;
    border-color: #000;
}
.conte2
{
    width: 1000px;
    height: 700px;
    margin: 0px auto;
    text-align: center;
    border-style: solid;
    border-color: #000;
}
.fecha1
{
    margin-left: -40rem !important;
}
.fecha2
{
    margin-left: 50rem !important;
    margin-top: -50px;
}


</style>

</head>
<body>
    <input type="button" onclick="printDiv('areaImprimir')" value="imprimir div" />
    <div id="areaImprimir">
        @foreach ( $data as $item )
    
<header class="conte1">

<h1>Orden de servicio Sistemas <br> Orden No {{$item->id}}</h1>

<p class="fecha1"> <strong>fecha solicitada por el usuario:</strong>  <br>{{$item->updated_at}}</p>
<p class="fecha2">  <strong>fecha de ejecucion:</strong>  <br> {{$item->real_delivery_time}}</p>
<h2> <strong> Descripcion de la tarea </strong> <br></h2>
<p>{{$item->task}}</p>
</header>

<div class="conte2">
<h2>Material utilizado</h2>
<p>{{$item->used_material}}</p>
<h2>Observaciones</h2>
<p>{{$item->description_work}}</p>
<br><br>
<br>
<img src="{{$item->firm_path}}"  width="250" height="250" alt="">
<hr width="250" >
<p>{{$item->user_name}} <br>  <br>    Firma usuaruio conforme  </p>
</div>
@endforeach
</div>
<script>
    function printDiv(nombreDiv) {
     var contenido= document.getElementById(nombreDiv).innerHTML;
     var contenidoOriginal= document.body.innerHTML;

     document.body.innerHTML = contenido;

     window.print();

     document.body.innerHTML = contenidoOriginal;
}
</script>


</body>
</html>

