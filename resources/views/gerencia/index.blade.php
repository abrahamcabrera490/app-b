
@extends('layouts.app')

@section('content')


<style>
    
*{
    margin: 0px;
    padding: 0px;
}
a{
    text-decoration: none;
    color: black;
}
.contenedor
{

text-align: center;
margin: 0px auto;
padding-top: 5px;
padding-bottom: 5px;
width: 900px;
height: 450px;


}
.gerente
{

    margin: 0px auto;
    text-align: center;
    padding-top: 1rem;
}
.centro
{
    padding-top: 2rem;
    margin: 0px auto;
    margin-top: 5px;
}
.card
{
    display: inline-flex;
    
}
.prog
{
    margin-top: 60px;
    border-style:solid;
    border-radius: 10px;
    width: 250px;
    height: 90px;
    
}
</style>


<div class="contenedor container col-xl-12">
    <h1 class="gerente center-block">Bienvenido al sistema  {{ Auth::user()->name }} <br>Esperamos que tengas un buen día</h1>
  <input type="month">
<div class="centro container">
 <div class="card">
    <a href="sistemas">
    <div class=" prog center-block">
    <h3>Sistemas</h3>
    <div class="progress ">
        <div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
      </div>
    </div>
</div>
</a>




<div class="card">
    <a href="almacen">
    <div class=" prog center-block">
    <h3>Almacen</h3>
    <div class="progress ">
        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
      </div>
    </div>
</a>
</div>


<div class="card">
    <a href="calidad">
    <div class=" prog center-block">
    <h3>Calidad</h3>
    <div class="progress ">
        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
      </div>
    </div>
</a>
</div>




   <div class="card"> 
    <a href="cobranza">
    <div class=" prog center-block">
    <h3>Credito y cobranza</h3>
    <div class="progress ">
        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
      </div>
    </div>
</a>
</div>





<div class="card">
    <a href="compras">
    <div class=" prog center-block">
    <h3>Compras</h3>
    <div class="progress ">
        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
      </div>
    </div>
</a>
</div>



<div class="card">
    <a href="mtto">
    <div class=" prog center-block">
    <h3>Mantenimiento</h3>
    <div class="progress ">
        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
      </div>
    </div>
</div>

</a>
</div>




<div class="card">
    <a href="produc">
    <div class=" prog center-block">
    <h3>Produccion</h3>
    <div class="progress ">
        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
      </div>
    </div>
</a>
</div>






<div class="card">
    <a href="pedidos">
    <div class=" prog center-block">
    <h3>Pedidos</h3>
    <div class="progress ">
        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
      </div>
    </div>
</a>
</div>




<div class="card">
    <a href="logistica">
    <div class=" prog center-block">
    <h3>Loguistica</h3>
    <div class="progress ">
        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
      </div>
    </div>
</a>
</div>

<div class="card">
    <a href="rh">
    <div class=" prog center-block">
    <h3>Recursos Humanos</h3>
    <div class="progress ">
        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
      </div>
    </div>
</a>
</div>





<div class="card">
    <a href="seguridad">
<div class=" prog center-block">
    <h3>Seguridad</h3>
    <div class="progress ">
        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
      </div>
    </div>
</a>
</div>


<div class="card">
    <a href="conta">
    <div class=" prog center-block">
    <h3>Contabilidad</h3>
    <div class="progress ">
        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
      </div>
    </div>
</a>
</div>


    </div>

</div> 

@endsection


