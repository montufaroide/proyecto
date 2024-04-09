

<label for="nombre">{{'Nombre'}} </label>
    <input class="form-control" type="text" name="nombre" id="nombre" 
    value="{{ isset($usuario->nombre)?$usuario->nombre:''}}">
    </br>
     <label for="ap_paterno">{{'Apellido Paterno'}} </label>
    <input class="form-control" type="text" name="ap_paterno" id="ap_paterno" 
    value="{{ isset($usuario->ap_paterno)?$usuario->ap_paterno:''}}">
</br>
     <label for="ap_materno">{{'Apellido Materno'}} </label>
    <input class="form-control" type="text" name="ap_materno" id="ap_materno" 
     value="{{ isset($usuario->ap_materno)?$usuario->ap_materno:''}}">
</br>
     <label for="usuario">{{'Usuario'}} </label>
    <input class="form-control" type="text" name="usuario" id="usuario" 
    value="{{ isset($usuario->usuario)?$usuario->usuario:''}}">
</br>
    <label for="perfil">{{'Perfil'}} </label>
    <input class="form-control" type="text" name="perfil" id="perfil" 
    value="{{ isset($usuario->perfil)?$usuario->perfil:''}}">
</br>
    <label for="Foto">{{'Foto'}} </label>
    @if(isset($usuario->foto))
    </br>
    <img  src="{{ asset('storage').'/'.$usuario->foto }}" alt=" " width="200">
    </br>
    @endif
    <input class="form-control" type="file" name="Foto" id="Foto" value="">
</br>
    
    <input type="submit" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}">

    <a href="{{url('usuarios')}}" >Regresar</a>