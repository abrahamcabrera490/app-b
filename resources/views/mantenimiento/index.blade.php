
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
      <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Grafica</a>
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
                            <form action="{{ route('mttocap') }}" method="POST">
                                @csrf
                                @method('POST')
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Indicador</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td><input type="text" readonly class ="col-md-12" name="des1[]"  value="Ordenes de trabajo recibidas"  ></td>
                                            <td><input type="number"   width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                            
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td><input type="text" class="col-md-12" name="des1[]" value = "Ordenes de trabajo realizadas" readonly></td>
                                            <td><input type="number"   width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                           
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td><input type="text"  value="Ordenes de trabajo pendientes" name="des1[]" readonly class="col-md-12"></td>
                                            <td><input type="number"  width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                           
                                        </tr>
                        
                                        <tr>
                                            <th scope="row">4</th>
                                            <td><input type="text" name="des1[]" value="Ordenes de trabajo pendientes" readonly class="col-md-12"></td>
                                            <td><input type="number"   width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                           
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td><input type="text" name="des1[]"  value="Ordenes de trabajo canceladas" readonly class="col-md-12"></td>
                                            <td><input type="number"   width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                           
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td><input type="text" name="des1[]" value="Porcentaje de cumplimiento de órdenes realizadas" readonly class="col-md-12"></td>
                                            <td><input type="number"   width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                           
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td><input type="text" name="des1[]" value="Porcentaje de cumplimiento de mttos preventivos" readonly class="col-md-12"></td>
                                            <td><input type="number"   width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                           
                                        </tr>
                                        <tr>
                                            <th scope="row">8</th>
                                            <td><input type="text" name="des1[]" value="Días promedio de recepción de O.T. vs realización" readonly class="col-md-12"></td>
                                            <td><input type="number"   width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                           
                                        </tr>
                                        <tr>
                                            <th scope="row">9</th>
                                            <td><input type="text" value="Lubricaciones realizadas" name="des1[]" readonly class="col-md-12"></td>
                                            <td><input type="number"   width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                           
                                        </tr>             
                                           <tr>
                                            <th scope="row">10</th>
                                            <td><input type="text" value="Mantenimientos preventivos realizados" name="des1[]" readonly class="col-md-12"></td>
                                            <td><input type="number"   width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                           
                                        </tr>
                        
                                        <tr>
                                            <th scope="row">11</th>
                                            <td><input type="text" name="des1[]" value="Contratación de externos" readonly class="col-md-12"></td>
                                            <td><input type="number"   width="95" name="eventos[] " required > </td>
                                             
                                             
                                            <td><input type="text"   width="95"   name="Observaciones[]" required></td>
                                           
                                        </tr>
                                        <tr>
                                            <th scope="row">12</th>
                                            <td><input type="text" name="des1[]"  value="Costo de contratación externa" readonly class="col-md-12"></td>
                                            <td><input type="number"   width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                           
                                        </tr>
                                        <tr>
                                            <th scope="row">13</th>
                                            <td><input type="text" name="des1[]" value="Trabajos fuera planta realizados por personal Mtto" readonly class="col-md-12"></td>
                                            <td><input type="number"   width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                           
                                        </tr>
                                        <tr>
                                            <th scope="row">14</th>
                                            <td><input type="text" name="des1[]" value="Proyectos nuevos" readonly class="col-md-12"></td>
                                            <td><input type="number"   width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                           
                                        </tr>
                                        <tr>
                                            <th scope="row">15</th>
                                            <td><input type="text" name="des1[]" value="Capacitaciones recibidas" readonly class="col-md-12"></td>
                                            <td><input type="number"   width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                           
                                        </tr>
                                        <tr>
                                            <th scope="row">16</th>
                                            <td><input type="text" name="des1[]" value="Costo de materiales utilizados" readonly class="col-md-12"></td>
                                            <td><input type="number"   width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                           
                                        </tr>
                                        <tr>
                                            <th scope="row">17</th>
                                            <td><input type="text" name="des1[]" value="Requisiciones de compras solicitadas" readonly class="col-md-12"></td>
                                            <td><input type="number"   width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                           
                                        </tr>
                                        <tr>
                                            <th scope="row">18</th>
                                            <td><input type="text" name="des1[]" value="Adquisición de equipos nuevos" readonly class="col-md-12"></td>
                                            <td><input type="number"   width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                           
                                        </tr>
                                        <tr>
                                            <th scope="row">19</th>
                                            <td><input type="text" name="des1[]" value="Equipos fuera de uso" readonly class="col-md-12"></td>
                                            <td><input type="number"   width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                           
                                        </tr>
                                        <tr>
                                            <th scope="row">20</th>
                                            <td><input type="text" name="des1[]" value="Mantenimientos preventivos por hacer" readonly class="col-md-12"></td>
                                            <td><input type="number"   width="95" name="eventos[]" required > </td>
                                             
                                             
                                            <td><textarea type="text"   width="95" name="Observaciones[]" required></textarea></td>
                                           
                                        </tr>
                                      
                        
                                    
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

            <div class="container">
                <div class="col-md-8 center-block">
                    <h1>  RENDIMIENTO DEPARTAMENTO  </h1>
                    <h2 id="porcentaje"></h2>
            <canvas id="myChart" class="row col-md-8"></canvas>
                </div>
            </div>


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
                data: [x1, resta],
                backgroundColor: [
                    'rgba(6, 9, 97, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    
                ],
                borderColor: [
                    'rgba(6, 9, 97, 1)',
                    'rgba(255, 255, 255, 1)',
                    
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


