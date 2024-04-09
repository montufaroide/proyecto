Seccion para crear usuarios

<form method="post" action="{{url('/usuarios')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('usuarios.form',['Modo'=>'crear'])
</form>
