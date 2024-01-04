@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2>Modifier des utilisateures</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary mb-2" href="{{ route('users.index') }}"> Retour </a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> Quelque chose s'est mal passé.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Surnom:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Nom:</strong>
            {!! Form::text('firstname', null, array('placeholder' => 'firstname','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Prénom:</strong>
            {!! Form::text('lastname', null, array('placeholder' => 'lastname','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Fonction:</strong>
            {!! Form::text('fonction', null, array('placeholder' => 'fonction','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Mot de pass:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </div>
</div>
{!! Form::close() !!}


@endsection
