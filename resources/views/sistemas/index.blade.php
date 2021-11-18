
@extends('layouts.app')

@section('content')


<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Mostrar</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Capturar</a>
    </li>
  </ul>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="container-fluid spark-screen">
            <div class="row">
                <div class="col-xl-12 col-md-offset-2">
        









<!--
=================================================================================================
=================================================================================================
=================================================================================================
=================================================================================================
-->
<h1 class="center-block"><strong>Dpto. Sistemas</strong></h1>
<hr>

<h1 class="center-block"><strong>Comparar Por meses</strong></h1>
<hr>





<form id="frmdate" name="frmdate"  action="" method="GET">
    @csrf
        @method('GET')
    <div class="form-group">
      <label for="exampleInputEmail1">Seleccione el primer mes</label>
      <input  class="form-control"  type="month"  name="month" id="month">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Seleccione el segundo mes </label>
      <input class="form-control" type="month"  name="month2" id="month">
    </div>

    <input class="btn btn-info" type="submit"  value="CONSULTA">
  </form>


 <button hidden class="btn btn-success float-rigth" onclick="exportTableToExcel('data_table')">Enviar a Excel</button> &nbsp;
 <button hidden class="btn btn-danger float-rigth" onclick="printPDF()">enviar a Pdf</button>


   
   
 <table  class="table table-responsive table-striped">
     <thead>
         <tr>
             
             <th scope="col">Descripcion</th>
             <th scope="col">Eventos  mes uno</th>
             <th scope="col">Eventos  mes dos</th>
             <th scope="col">porcentaje</th>
             <th scope="col">Incremento o Decremento</th>
             <th scope="col">Grafica</th>
             <th scope="col">Acciones</th>
         </tr>
     </thead>
     <tbody id="mensaje" >

     </tbody>      
     
 </table>  
<!--
=================================================================================================
=================================================================================================
=================================================================================================
=================================================================================================
-->

<hr>

<h1 class="center-block"><strong>Historico de Indicadores</strong></h1>
<hr>


                    
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>

                                    
            
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Eventos</th>
                                    <th scope="col">Observaciones</th>
                                    <th scope="col">Fecha de captura</th>
            
                                </tr>
                            </thead>
                            @foreach ($data as $item)
        
                            <tr>
                                <td>{{$item->desctription}}</td>
                                <td>{{$item->eventos}}</td>
                                <td>{{$item->observaciones}}</td>
                                <td>{{$item->fecha}}</td>
                            </tr>
                            
                            @endforeach
                        </table>
                    </div>
                </div>
        
                </div>
            </div>    
        
    </div>
    <div class="tab-pane   fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="container">
            <div class="row justify-content-center">
                <div class="">
                    <div class="card">
                        <div class="card-header">Bienvenido</div>
                            <form action="{{ route('cap') }}" method="POST">
                                @csrf
                                @method('POST')
                                <table  class="table table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">Eventos</th>
                                            <th scope="col">Observaciones</th>
                                            <th scope="col">Fecha de captura</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ( $data2 as $indi )
                                                
                                            <th scope="row">{{$indi->id}}</th>
                                          <td><textarea name="des1[]" readonly value="{{$indi->Description}}"  > {{$indi->Description}}  </textarea> </td>
                                            <td><input type="number" step="any" width="35" name="eventos[]" value="13.5" required > </td>
                                            <td><textarea type="text" width="35" name="Observaciones[]" value=""  required>Indicador Piloto</textarea></td>
                                            <td><input type="date" disabled name="fecha" value="<?php echo date('Y-m-d'); ?>"  /></td>
                                        </tr>    
                                            @endforeach

                                        </tbody>
                        
                                    </table>
                        <button type="submit" class="btn btn-warning" >Capturar datos</button>
                        
                                </form>
                        
                                <!--Tabla indicadores-->
                        
                            </form>               
        
        
        
        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
   
  </div>
        
            </div>
            
            </div>
         
  <script   src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

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
    var a = '';
    a = x1[0][i].observaciones;
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
             
                <td>  <button onclick="alert('Observaciones:  ' + '${a}');" class ="btn btn-info">Mostrar Detalles</button>  </td>
            </tr>`;
    
    console.log(tabla);
    
    
    }
    
    
    $("#mensaje").html(tabla);
    
    
    
    
            });
        });
    
    
    
    
$( document ).ready(function() {
$(".export").click(function() {
var export_type = $(this).data('export-type');
$('#data_table').tableExport({
type : export_type,
escape : 'false',
ignoreColumn: []
});
});
});
    
    
    
    
    }

    function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'Indicadores.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}

    
    </script>  
@endsection


