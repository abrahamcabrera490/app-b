
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
            <a class="btn btn-primary" href="{{route("Usr")}}"> Back</a>
        </div>
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



<form  class="col-xl-12" action="#">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <br>
         <input type="text" class="col-md-12" name="name" value="{{ $user->name}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <br>
                <input class="col-md-12"  type="text" name="email" value="{{ $user->email}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <br>
                <input type="password" class="col-md-12" name="password" value="{{ $user->password}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirm Password:</strong>
                <br>
                <input type="password" class="col-md-12"  name="password" value="{{ $user->password}}">
            </div>
        </div>
        @foreach ( $roles as $id => $name )
            <label>

                <input 
                type="checkbox"
                 value="{{$id}}"
                @if ($user->roles->pluck('name')->contains($name)== true)
                    checked
                @endif
                  
                  name="roles" id=""
                  >  
        {{$name}}
        
            </label>  &nbsp; 
        @endforeach
        
</form>
    </div>
</div>
@endsection