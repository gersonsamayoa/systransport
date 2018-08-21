@extends('admin.template.main')
@section('title', 'Contactanos')

@section('content')
@include('flash::message')
<div class="row bg-4">
      <div class="col-sm-6 text-left">
      <h2>Escríbenos:</h2>
            {!! Form::open(['route'=>'mail.store', 'method'=>'POST']) !!}
            <div class="form-group">
            {!!Form::label('name', 'Nombre')!!}
            {!!Form::text('name', NULL, ['class'=>'form-control', 'placeholder'=>'']) !!}
            </div>

            <div class="form-group">
            {!!Form::label('email', 'Correo')!!}
            {!!Form::text('email', NULL, ['class'=>'form-control', 'placeholder'=>'']) !!}
            </div>

            <div class="form-group">
            {!!Form::label('mensaje', 'Mensaje')!!}
            {!!Form::textarea('mensaje', NULL, ['class'=>'form-control', 'placeholder'=>'']) !!}
            </div>

            <div class="form-group">
            {!!Form::submit('Enviar', ['class'=> 'btn btn-primary'])!!}
            {!!Form::close()!!}
            </div>
          </div>

      <div class="col-sm-6 text-left">
      <br>
          
          <iframe width="100%" height="385" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3214.8392760880893!2d-90.37737609999999!3d14.083046399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x858845e3d242b84b%3A0xc7c978dcff674a57!2sColegio+CTS!5e1!3m2!1ses!2sgt!4v1488922361062"></iframe>
      </div>
          
      </div>

    <div class="row bg-4">
    <div class="col-sm-6 text-left">
    <h2>Tambien puedes contactarnos:</h2>
    <p><span class="glyphicon glyphicon-home">   </span> Dirección: Edificio Sixtino en Zona 10 Guatemala</p>
    <p><span class="glyphicon glyphicon-earphone">   </span> Teléfono: xxxx-xxxx</p>
    <p><span class="glyphicon glyphicon-envelope">   </span> Correo: admin@systransport.com.gt</p>
    
    </div>
   </div>

@endsection