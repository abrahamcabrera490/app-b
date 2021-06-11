
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Usuarios Registrados</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
          
                <table class="table table-bordered">
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Roles</th>
                      <th width="280px">Action</th>
                    </tr></tr>
                    @foreach ($data as $key => $user)
                     <tr><tr>
                       <td>{{ ++$i }}</td>
                       <td>{{ $user->name }}</td>
                       <td>{{ $user->email }}</td>
                       <td>
                      
                        @foreach($user->roles as $role)
                           <label class="badge badge-success">{{ $role->display_name }}</label>
                        @endforeach
                      
                       </td>
                       <td>
                        <a href="{{ route('usredit',$user->id) }}" type="button" class="btn btn-warning">Editar</a>   
                        <button type="button" class="btn btn-danger">Eliminar</button>
                    </td>
                     </tr>
                    @endforeach
                   </table>
                   
                   
                   {!! $data->render() !!}
                   
            </div>
        </div>
    </div>
    
    <!--Tabla indicadores-->
 
@endsection


