

@extends('layouts.app')

@section('content')




  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-xl-12 col-md-offset-2">
    
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>

                                
        
                                <th scope="col">id</th>
                                <th scope="col">tarea</th>
                                <th scope="col">status</th>
                                <th scope="col">Fecha a realizar</th>
                                <th scope="col">Creacion Reporte</th>
                                <th scope="col">departamento</th>
                                <th scope="col">Prioridad</th>
                                <th scope="col">Acciones</th>
                                
                            </tr>
                        </thead>
                        @foreach ($data as $item)
    
                        <tr
                        
                        
                        @if ($item->priority=='Media')
                            class="bg-warning"
                        @elseif ($item->priority=='Alta')
                            class="bg-danger"    
                        @elseif ($item->priority=='Baja')
                            class="bg-success"    
                        @endif
                        >
                            <td>{{$item->id}}</td>
                            <td>{{$item->task}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->updated_at}}</td>
                            <td>{{$item->date_time}}</td>
                            <td>{{$item->dpto}}</td>
                            <td>{{$item->priority}}</td>
                            
                            <td>
                                <!--/* route('usredit',$user->id)*/ -->
                                <a href="{{  route('run_ticket', $item->id) }}" type="button" class="btn btn-primary">Ejecutar</a>   
                                <a href="{{  route('print', $item->id) }}" type="button" 
                                    @if ($item->priority == 'Baja')
                                        class="btn btn-info"
                                    @else
                                        class="btn btn-success"
                                    @endif
                                    
                                    >imprimir</a>
                                <a href="{{  route('priority', $item->id) }}" type="button" 
                                    @if ($item->priority == 'Media')
                                    class="btn btn-info"
                                    @else
                                    class="btn btn-warning"
                                @endif
                                    
                                    >Prioridad</a>
                                <button type="button" 
                                @if ($item->priority == 'Alta')
                                    class="btn btn-info"
                                @else
                                    class="btn btn-danger"
                                @endif
                                
                                
                                >Cancelar</button>
                            </td>
                        </tr>
                        
                        @endforeach
                    </table>
                </div>
            </div>
    
            </div>
        </div>    
    
</div>
@endsection
