seccion para editar usuarios


<form method="post" action="{{url('/usuarios/'.$usuario->id)}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

@include('usuarios.form',['Modo'=>'editar'])
</form>
