
@extends('layouts.app')

@section('content')


<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Mostrar</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Capturar</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Rendimiento</a>
    </li>
  </ul>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="container-fluid spark-screen">
            <div class="row">
                <div class="col-xl-12 col-md-offset-2">
        
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
                                <td>{{$item->description}}</td>
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
                            <form action="{{ route('comprascap') }}" method="POST">
                                @csrf
                                @method('POST')
                                <table class=" col-xl-12 col-md-12 col-xs-6 table table-responsive table-striped">
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
                                            <td><input type="text" readonly class ="col-md-12" name="des1[]"  value="{{$indi->Description}}"  ></td>
                                            <td><input type="number" step="any" width="35" name="eventos[]" required > </td>
                                            <td><textarea type="text" width="35" name="Observaciones[]" required></textarea></td>
                                            <td><input type="date" name="fecha" value="<?php echo date('Y-m-d'); ?>"  disabled/></td>
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



        <div class="container" class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
           
           <div class="row col-md-12">
               <div class="center-block">
                   <div class="container col-md-8">
            <form id="frmdate" name="frmdate" style="margin: 0px auto;" class=" center-block" action="" method="GET">
                @csrf
                    @method('GET')
            <label class="row" for="month">Ingresa Primer Mes</label>
            <input class="row" type="month"  name="month" id="month">
            <br>
            <label class="row" for="month2">Ingresa segundo Mes</label> 
            <input type="month"  name="month2" id="month"><br><br>
            <input class="btn btn-info" type="submit"  value="CONSULTA"> <br>
            <br>
            


            <button hidden class="btn btn-success float-rigth" onclick="exportTableToExcel('data_table')">Enviar a Excel</button> &nbsp;
            <button hidden class="btn btn-danger float-rigth" onclick="printPDF()">enviar a Pdf</button>
            </form>
        </div>
            <div >

                <br>

              
            </div>
            <table id="data_table" class=" col-xl-12 col-md-12 col-xs-6 table table-responsive table-striped">
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
         
        </div>     
    
    </div>

    </div>
    </div>
   
  </div>
            
            </div>
            
            </div>
         
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

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
                url:"comprasbf",
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
    tabla +=  `<tr>  <td>  ${x1[0][i].description}  </td> 
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


