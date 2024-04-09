@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

<a href="{{url('usuarios/create')}}" >Agregar Empleado</a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th> Foto</th>
            <th> Nombre</th>
            <th> Apellido Paterno</th>
            <th> Apellido Materno</th>
            <th> Usuario</th>
            <th> Perfil</th>
            <th> Acciones</th>
        </tr>
    </thead>


    <tbody>
    
    @foreach ($Lst_Usuarios as $usuario)
        <tr>
            <td>{{$loop->iteration}} </td>
            <td> 
            <img  src="{{ asset('storage').'/'.$usuario->foto }}" alt=" " width="200">
            
            </td>
            <td> {{ $usuario->nombre }}</td>
            <td>{{ $usuario->ap_paterno }} </td>
            <td>{{ $usuario->ap_materno }} </td>
            <td>{{ $usuario->usuario }} </td>
            <td>{{ $usuario->perfil }} </td>
            <td>  
            
            <a href="{{ url('/usuarios/'.$usuario->id.'/edit')}}">
            EDITAR
            </a>
|

            
            <form method="POST" action="{{ url('/usuarios/'.$usuario->id) }}">
                {{csrf_field()}}
                {{method_field('DELETE')}}
               <button type="submit" onclick="return confirm('¿Borrar?')"> Borrar</button>
            </form> </td>
        </tr>
    @endforeach
    
        
    </tbody>
</table>