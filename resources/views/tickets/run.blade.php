
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
<style>



#draw-canvas {
  border: 2px dotted #CCCCCC;
  border-radius: 5px;
  cursor: crosshair;
}

#draw-dataUrl {
  width: 100%;
}
h3 {
    margin: 10px 15px;
}

header {
    background: #273B47;
    height: 100%;
    width: 100%;
    padding: 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

section{
    flex:1;
}

h1 {
    margin: 10px 15px;
}
header {
    color: white;
    font-weight: 500;
    padding-left: 15px;
}


.button {
    background: #3071a9;
    box-shadow: inset 0 -3px 0 rgba(0,0,0,.3);
    font-size: 14px;
    padding: 5px 10px;
    border-radius: 5px;
    margin: 0 15px;
    text-decoration: none;
    color: white;
}

.button:active {
    transform: scale(0.9);
}

.contenedor {
    width: 100%
    margin: 5px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.instrucciones {
    width: 90%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items:center;
    margin-bottom: 10px;
}

label {
    margin: 0 15px;
}

footer {
    background: #273B47;
    color: white;
    height: 100%;
    width: 100%;
    margin-top: 10px;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}


input[type=range] {
  -webkit-appearance: none;
  margin: 18px 0;

}
input[type=range]:focus {
  outline: none;
}
input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  animate: 0.2s;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: #3071a9;
  border-radius: 1.3px;
  border: 0.2px solid #010101;
}
input[type=range]::-webkit-slider-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -14px;
}
input[type=range]:focus::-webkit-slider-runnable-track {
  background: #367ebd;
}
input[type=range]::-moz-range-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  animate: 0.2s;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: #3071a9;
  border-radius: 1.3px;
  border: 0.2px solid #010101;
}
input[type=range]::-moz-range-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
}
input[type=range]::-ms-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  animate: 0.2s;
  background: transparent;
  border-color: transparent;
  border-width: 16px 0;
  color: transparent;
}
input[type=range]::-ms-fill-lower {
  background: #2a6495;
  border: 0.2px solid #010101;
  border-radius: 2.6px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}
input[type=range]::-ms-fill-upper {
  background: #3071a9;
  border: 0.2px solid #010101;
  border-radius: 2.6px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}
input[type=range]::-ms-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
}
input[type=range]:focus::-ms-fill-lower {
  background: #3071a9;
}
input[type=range]:focus::-ms-fill-upper {
  background: #367ebd;
}


</style>

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

        <h2 class="text-center">Numero de Orden:  <strong>{{$item->id}}</strong>  </h2>
        <h2 class="text-center">Departamento: <strong>{{$item->dpto}}</strong>  </h2>
        <h2 class="text-center">Usuarios que lo solicito:  <br> <strong>{{$item->user_name}}</strong>  </h2>
        <br>
        <h2 class="text-center">Tarea a realizar</h2>
        <br>
        <h4  class="text-center">{{$item->task}}</h4>

        <br><br>
        <h2 class="text-center">Imagen antes de realizar el trabajo</h2>
      
      <div class="row col-md-12 center-block">
        <img style="margin: 0px auto;" class="center-block float-center  text-center col-md-auto col-md-8"  src="{{ route('watch_image', ['filename'=> $item->image_work_before]) }}" alt="Imagen del pendiente" />
    </div>


    </div>

    @endforeach

    <hr>

<div style="margin: 0px auto;" class="row col-md-12  center-block ">

<form   class="col-md-12   centerblock"  action="{{route('close_ticket.update', $item->id)}}" enctype="multipart/form-data" method="POST">
  @method('PATCH')

@csrf


<label for="fecha_real">Fecha en la cual se concluyo el trabajo</label>

<input class="col-md-12 center-block" type="datetime-local" name="date" id="">
<br>

<label for="decription">Observaciones del trabajo</label>
<br>
<textarea class="col-md-12 center-block" name="description" id="" cols="55" rows="15"></textarea>
<br>
<br>

<label for="decription">Material Utilizado</label>
<br>
<textarea class="col-md-12 center-block" name="tools" id="" cols="35" rows="10"></textarea>
<br>
<label for="dpto">Imagen del trabajo finalizado</label>
<br>
<input  class="col-md-12 center-block" type="file"  name="upload_file" capture="camera">
<br>
<br>
<h4 class="text-center">Firma de usuario conforme</h4>
<br>
<!-- Inicio canvas draw-->
<div class="  container  contenedor">

    <div class="  row ">
        <div class="col-md-12">
             <canvas id="draw-canvas" width="320" height="360">
                 No tienes un buen navegador.
             </canvas>
         </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <input type="button" class="button" id="draw-submitBtn" value="Aceptar firma">
            <input type="button" class="button" id="draw-clearBtn" value="Borrar firma">

                    <label hidden>Color</label>
                    <input hidden type="color" id="color">
                    <label hidden>Tamaño Puntero</label>
                    <input hidden type="range" id="puntero" min="1" default="1" max="5" width="10%">


        </div>

    </div>

    <br/>
    <div class="row">
        <div class="col-md-12">
            <textarea hidden id="draw-dataUrl" name="firm" class="form-control" rows="5">Para los que saben que es esto:</textarea>
        </div>
    </div>
    <br/>

<!--Fin canvas draw-->
<button class="bg-success col-md-12 center-block">Finalizar tarea</button>


</form>

</div>


    </div>
</div>


<script>

/*
		El siguiente codigo en JS Contiene mucho codigo
		de las siguietes 3 fuentes:
		https://stipaltamar.github.io/dibujoCanvas/
		https://developer.mozilla.org/samples/domref/touchevents.html - https://developer.mozilla.org/es/docs/DOM/Touch_events
		http://bencentra.com/canvas/signature/signature.html - https://bencentra.com/code/2014/12/05/html5-canvas-touch-events.html
*/

(function() { // Comenzamos una funcion auto-ejecutable

// Obtenenemos un intervalo regular(Tiempo) en la pamtalla
window.requestAnimFrame = (function (callback) {
    return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimaitonFrame ||
                function (callback) {
                     window.setTimeout(callback, 1000/60);
        // Retrasa la ejecucion de la funcion para mejorar la experiencia
                };
})();

// Traemos el canvas mediante el id del elemento html
var canvas = document.getElementById("draw-canvas");
var ctx = canvas.getContext("2d");


// Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
var drawText = document.getElementById("draw-dataUrl");
var drawImage = document.getElementById("draw-image");
var clearBtn = document.getElementById("draw-clearBtn");
var submitBtn = document.getElementById("draw-submitBtn");
clearBtn.addEventListener("click", function (e) {
    // Definimos que pasa cuando el boton draw-clearBtn es pulsado
    clearCanvas();
    drawImage.setAttribute("src", "");
}, false);
    // Definimos que pasa cuando el boton draw-submitBtn es pulsado
submitBtn.addEventListener("click", function (e) {
var dataUrl = canvas.toDataURL();
drawText.innerHTML = dataUrl;
drawImage.setAttribute("src", dataUrl);
 }, false);

// Activamos MouseEvent para nuestra pagina
var drawing = false;
var mousePos = { x:0, y:0 };
var lastPos = mousePos;
canvas.addEventListener("mousedown", function (e)
{
/*
  Mas alla de solo llamar a una funcion, usamos function (e){...}
  para mas versatilidad cuando ocurre un evento
*/
    var tint = document.getElementById("color");
    var punta = document.getElementById("puntero");
    console.log(e);
    drawing = true;
    lastPos = getMousePos(canvas, e);
}, false);
canvas.addEventListener("mouseup", function (e)
{
    drawing = false;
}, false);
canvas.addEventListener("mousemove", function (e)
{
    mousePos = getMousePos(canvas, e);
}, false);

// Activamos touchEvent para nuestra pagina
canvas.addEventListener("touchstart", function (e) {
    mousePos = getTouchPos(canvas, e);
console.log(mousePos);
e.preventDefault(); // Prevent scrolling when touching the canvas
    var touch = e.touches[0];
    var mouseEvent = new MouseEvent("mousedown", {
        clientX: touch.clientX,
        clientY: touch.clientY
    });
    canvas.dispatchEvent(mouseEvent);
}, false);
canvas.addEventListener("touchend", function (e) {
e.preventDefault(); // Prevent scrolling when touching the canvas
    var mouseEvent = new MouseEvent("mouseup", {});
    canvas.dispatchEvent(mouseEvent);
}, false);
canvas.addEventListener("touchleave", function (e) {
// Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
e.preventDefault(); // Prevent scrolling when touching the canvas
var mouseEvent = new MouseEvent("mouseup", {});
canvas.dispatchEvent(mouseEvent);
}, false);
canvas.addEventListener("touchmove", function (e) {
e.preventDefault(); // Prevent scrolling when touching the canvas
    var touch = e.touches[0];
    var mouseEvent = new MouseEvent("mousemove", {
        clientX: touch.clientX,
        clientY: touch.clientY
    });
    canvas.dispatchEvent(mouseEvent);
}, false);

// Get the position of the mouse relative to the canvas
function getMousePos(canvasDom, mouseEvent) {
    var rect = canvasDom.getBoundingClientRect();
/*
  Devuelve el tamaño de un elemento y su posición relativa respecto
  a la ventana de visualización (viewport).
*/
    return {
        x: mouseEvent.clientX - rect.left,
        y: mouseEvent.clientY - rect.top
    };
}

// Get the position of a touch relative to the canvas
function getTouchPos(canvasDom, touchEvent) {
    var rect = canvasDom.getBoundingClientRect();
console.log(touchEvent);
/*
  Devuelve el tamaño de un elemento y su posición relativa respecto
  a la ventana de visualización (viewport).
*/
    return {
        x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
        y: touchEvent.touches[0].clientY - rect.top
    };
}

// Draw to the canvas
function renderCanvas() {
    if (drawing) {
  var tint = document.getElementById("color");
  var punta = document.getElementById("puntero");
  ctx.strokeStyle = tint.value;
  ctx.beginPath();
        ctx.moveTo(lastPos.x, lastPos.y);
        ctx.lineTo(mousePos.x, mousePos.y);
  console.log(punta.value);
    ctx.lineWidth = punta.value;
        ctx.stroke();
  ctx.closePath();
        lastPos = mousePos;
    }
}

function clearCanvas() {
    canvas.width = canvas.width;
}

// Allow for animation
(function drawLoop () {
    requestAnimFrame(drawLoop);
    renderCanvas();
})();

})();

</script>
@endsection