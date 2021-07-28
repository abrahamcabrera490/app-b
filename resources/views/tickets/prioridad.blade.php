


@extends('layouts.app')

@section('content')



<div style="margin: 0px auto;" class="container center-block text-center col-md-12">
    <h1>  Asignar Prioridad de la Orden No.  </h1>
    @foreach ( $data as $item  )
        <h2>{{$item->id}}</h2>
    
<div  class="row center-block col-md-8">
<form class="row center-block col-md-8" action="{{route('assigned_prioriti.update', $item->id)}}" method="POST">
    @method('PATCH')

    @csrf
    
<div style="margin: 0px auto" class="row center-block col-md-8">
 
<div class="form-check form-check-inline">
    <input class="form-check-input" name="priority" type="checkbox" id="inlineCheckbox1" value="Alta">
    <label class="form-check-label" for="inlineCheckbox1">Alta</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" name="priority" type="checkbox" id="inlineCheckbox2" value="Media">
    <label class="form-check-label" for="inlineCheckbox2">Media</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" name="priority" type="checkbox" id="inlineCheckbox3" value="Baja" >
    <label class="form-check-label" for="inlineCheckbox3">Baja</label>
  </div>
</div>
<br>
  <button class="btn btn-primary">Asignar Prioridad</button>
</form>
</div>
</div>
@endforeach
  @endsection

