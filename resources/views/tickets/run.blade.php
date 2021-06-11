
@extends('layouts.app')


@section('content')
<div class="container">
    <div class="abs-center">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ejecucion del trabajo</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{route("orders_show")}}"> Ordenes</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

@foreach ( $data as  $item )
    

    <div class="col-md-12 center-block">

        <p class="text-center">Numero de Orden: <br>   <br> <strong>{{$item->id}}</strong>  </p>
        <p class="text-center">Departamento: <br>   <br> <strong>{{$item->dpto}}</strong>  </p>
        <br>
        <p class="text-center">Usuarios que lo solicito: <br>   <br> <strong>{{$item->user_name}}</strong>  </p>
        <br>
        <br>
        <br>
        <p class="text-center">Tarea a realizar</p>

        <br>
        <br>
        <br>
        <h4  class="text-center">{{$item->task}}</h4>

        <br><br>
        <p class="text-center">Imagen antes de realizar el trabajo</p>
      
      <div class="row col-md-8 center-block">
        <img class="center-block float-center col-md-8"  src="{{ route('watch_image', ['filename'=> $item->image_work_before]) }}" alt="Imagen del pendiente" />
    </div>


    </div>

    @endforeach

    <hr>

<div class="row">

<form action="#" method="POST">


@csrf
@method('POST')







<h4>Firma de usuario conforme</h4>

<canvas id="sheet" width="250" height="250" style="border: 1px solid black"></canvas>

</form>


</div>


    </div>
</div>


<script>

var canvas = document.getElementById('sheet'), g = canvas.getContext("2d");
g.strokeStyle = "hsl(208, 100%, 43%)";
g.lineJoin = "round";
g.lineWidth = 1;
g.filter = "blur(1px)";

const
relPos = pt => [pt.pageX - canvas.offsetLeft, pt.pageY - canvas.offsetTop],
drawStart = pt => { with(g) { beginPath(); moveTo.apply(g, pt); stroke(); }},
drawMove = pt => { with(g) { lineTo.apply(g, pt); stroke(); }},

pointerDown = e => drawStart(relPos(e.touches ? e.touches[0] : e)),
pointerMove = e => drawMove(relPos(e.touches ? e.touches[0] : e)),

draw = (method, move, stop) => e => {
    if(method=="add") pointerDown(e);
    canvas[method+"EventListener"](move, pointerMove);
    canvas[method+"EventListener"](stop, g.closePath);
};

canvas.addEventListener("mousedown", draw("add","mousemove","mouseup"));
canvas.addEventListener("touchstart", draw("add","touchmove","touchend"));
canvas.addEventListener("mouseup", draw("remove","mousemove","mouseup"));
canvas.addEventListener("touchend", draw("remove","touchmove","touchend"));

</script>
@endsection