
@extends('layouts.app')


@section('content')
<div class="container">
    <div class="abs-center">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Usuario</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{route("Usr")}}"> Otros Usuarios</a>
        </div>
        <br>
        
    </div>
</div>


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



<form  class="col-xl-12" action="{{route('regusr')}}" method="POST">
    @method('POST')

    @csrf
    
@include('users.form', ['user' => new App\Models\User])


<button class="bg-success ">crear</button>
</form>


    </div>
</div>
@endsection