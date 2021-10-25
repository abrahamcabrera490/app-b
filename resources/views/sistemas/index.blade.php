
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
                                            <td><input type="number" width="35" name="eventos[]" required > </td>
                                            <td><textarea type="text" width="35" name="Observaciones[]" required></textarea></td>
                                            <td><input type="date" name="fecha" value="<?php echo date('Y-m-d'); ?>"  readonly/></td>
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



        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

                 <table class=" col-xl-12 col-md-12 col-xs-6 table table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">Evento Del mes</th>
                                            <th scope="col">Evento del mes anterior</th>
                                            <th scope="col">porcentaje</th>
                                            <th scope="col">Incremento o Decremento</th>
                                            <th scope="col">Grafica</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                       @if ($mespasado == null)
                       @foreach ( $fechaactual as $fa )
                       <tr>
                       <td>{{$fa->desctription}}</td>
                                            
                       <td> {{$fa->eventos}} </td>
                       <td> sin eventos </td>
                       <td>100%</td>    
                       </tr>
                        @endforeach   
                       @else
                           
                        
                        @for ($z = 0 ; $z <count($fechaactual) ; $z++)
                        
                        
    

                                 
                                            <td>{{$fechaactual[$z]->desctription}}</td>
                                            <td> {{$fechaactual[$z]->eventos}} </td>
                                            <td> {{$mespasado[$z]->eventos}} </td>

                                            @if ($mespasado[$z]->eventos == 0)
                                                
                                            <td> 100% </td>
                                            <td>0%</td>
                                            <td>
                                            <div class="progress ">
                                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                              </div>
                                            </td>
                                              @else
                                            <td> {{$fechaactual[$z]->eventos*100/$mespasado[$z]->eventos }}% </td>
                                            
                                                @if ( $fechaactual[$z]->eventos*100/$mespasado[$z]->eventos - 100 <0)
                                                <td  style="color: red;"> {{ ($N = $fechaactual[$z]->eventos*100/$mespasado[$z]->eventos) - 100 }} % </td>        

                                               
                                                @elseif($fechaactual[$z]->eventos*100/$mespasado[$z]->eventos - 100 >=0)
                                                 <td > {{ ($N = $fechaactual[$z]->eventos*100/$mespasado[$z]->eventos) - 100 }} % </td>
                                                @endif
                                                <td>
                                                    <div class="progress ">
                                                        <div class="progress-bar" role="progressbar" style="width: {{$fechaactual[$z]->eventos*100/$mespasado[$z]->eventos}}%;" aria-valuenow="{{$fechaactual[$z]->eventos*100/$mespasado[$z]->eventos}}" aria-valuemin="0" aria-valuemax="100">{{$fechaactual[$z]->eventos*100/$mespasado[$z]->eventos}}%</div>
                                                      </div>
                                                    </td>
                                            @endif
                                                                                       
                                        </tr>    
                                        @endfor             
                                            @endif
                                        </tbody>
                        
                        
                                    </table>
      <!--  
         <div class="container">
                <div class="col-md-8 center-block">
                    <h1>  Estado del area VS mes anterior  </h1>
                    <h2 id="porcentaje"></h2>
            <canvas id="myChart" class="row col-md-8"></canvas>
                </div>
            </div>
        -->

        </div>     
    


       
    </div>
   
  </div>
  <script>


$.ajax({
    url:'prom',
    method:'GET',
    data:{
        id:1,
        _token: $('input[name="_token"]').val()
    }
}).done(function(res){
   
    var x1 = JSON.parse(res);
    console.log(x1);
   document.getElementById('porcentaje').innerHTML = parseFloat(x1).toFixed(2) + " %";
   resta =  parseFloat(x1).toFixed(2) - 100;


    //Grafica
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['indicador'],
            datasets: [{
                label: 'indicadores',
                data: [x1],
                backgroundColor: [
                    'rgba(6, 9, 97, 0.2)',
                   
                    
                ],
                borderColor: [
                    'rgba(6, 9, 97, 1)',
                   
                    
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});


   


</script>
@endsection


