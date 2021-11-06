@extends('layouts.app')

@section('content')
<div class="container center-block col-xl-12">

<div class="row center-block">

<form id="frmdate" name="frmdate" style="margin: 0px auto;" class=" center-block" action="" method="GET">
@csrf
    @method('GET')
<label  for="mes1">Ingresa Primer Mes</label> <br>
<input type="month"  name="month" id="month1">
<br>
<label  for="mes1">Ingresa segundo Mes</label> <br>
<input type="month"  name="month2" id="month2">
<br>
<input type="submit"  value="CONSULTA">

</form>



</div>

</div>
<div ></div>
<table class=" col-xl-12 col-md-12 col-xs-6 table table-responsive table-striped">
    <thead>
        <tr>
            
            <th scope="col">Descripcion</th>
            <th scope="col">Eventos  mes uno</th>
            <th scope="col">Eventos  mes dos</th>
            <th scope="col">porcentaje</th>
            <th scope="col">Incremento o Decremento</th>
            <th scope="col">Grafica</th>
        </tr>
    </thead>
    <tbody id="mensaje" >
     
    </tbody>       
<script>
$(document).on("ready", function(){
    SendData();
});

function SendData(){
    $("#frmdate").on("submit",function(e){

        e.preventDefault();
        var frm = $(this).serialize();
        $.ajax({
            method:"GET",
            url:"consultaf",
            data:frm
        }).done( function( info){
//MOSTRAMOS  RESPUESTA del server
var x1 = JSON.parse(info);
var n = x1[0].length;

console.log(n); 
var tabla
var tablaii
for(var i = 0; i<n; i++)
{
var m = '';

    if(x1[1][i].eventos == 0 ){
               m = 100.00;
            }
    else{
               m = (x1[1][i].eventos*100/x1[0][i].eventos).toFixed(0);
 
            }
tabla +=  `<tr>  <td>  ${x1[0][i].desctription}  </td> 
            <td> ${ x1[0][i].eventos}  </td>
            <td> ${ x1[1][i].eventos}  </td>
            <td> ${ m}%  </td>
            <td> ${ m - 100 }%  </td>
            <td>
            <div class="progress ">
             <div class="progress-bar" role="progressbar" style="width: ${m}%;" aria-valuenow="${m}" aria-valuemin="0" aria-valuemax="100">${m}%</div>
                </div>
            </td>
             
        </tr>`;

console.log(tabla);


}


$("#mensaje").html(tabla);




        });
    });
}

</script>
@endsection