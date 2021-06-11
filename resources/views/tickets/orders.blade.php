

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
                                <th scope="col">departamento</th>
                                <th scope="col">Acciones</th>
                                
                            </tr>
                        </thead>
                        @foreach ($data as $item)
    
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->task}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->updated_at}}</td>
                            <td>{{$item->dpto}}</td>
                            <td>
                                <!--/* route('usredit',$user->id)*/ -->
                                <a href="{{  route('run_ticket', $item->id) }}" type="button" class="btn btn-primary">Ejecutar</a>   
                                <button type="button" class="btn btn-success">imprimir</button>
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
