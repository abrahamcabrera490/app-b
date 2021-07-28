<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre:</strong>
            <br>
     <input type="text" class="col-md-12" name="name" value="{{ $user->name or old('nombre')}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            <br>
            <input class="col-md-12"  type="text" name="email" value="{{ $user->email or old('email')}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            <br>
            <input type="password" class="col-md-12" name="password" value="{{$user->password or old('password')}}">
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
              
              name="roles[]" id=""
              >  
    {{$name}}
    
        </label>  &nbsp; 
    @endforeach
    
</div>