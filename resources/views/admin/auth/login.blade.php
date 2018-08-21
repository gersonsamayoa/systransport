@extends('admin.template.main')
@section('title', 'Login')

@section('content')
    @if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
    @endif
{!!Form::open(['route'=>'admin.auth.login', 'method' => 'POST'])!!}
<div class="form-group">
{!!Form::label('email', 'Correo Electrónico')!!}
{!!Form::email('email', NULL, ['class'=>'form-control', 'placeholder'=>'example@mail.com']) !!}
</div>
<div class="form-group">
{!!Form::label('password', 'Password')!!}
{!!Form::password('password', ['class'=>'form-control', 'placeholder'=>'*****']) !!}
</div>

<div class="form-group">
{!!Form::submit('Acceder', ['class'=> 'btn btn-primary'])!!}
<a class="btn btn-default" href="{{ route('admin.usuarios.create') }}">Crear Usuario</a>
</div>
{!!Form::close()!!}


@endsection
