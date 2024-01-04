@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2>Gestion des utilisateurs</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success mb-2" href="{{ route('users.create') }}">Créer un nouveau utilisateur </a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Nom d'utilisateur</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->firstname }} {{ $user->lastname }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->roles))
        @foreach($user->roles as $v)
           {{ $v->name }}
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info mb-2" href="{{ route('users.show',$user->id) }}">Voir plus</a>
       <a class="btn btn-primary mb-2" href="{{ route('users.edit',$user->id) }}">Modifier</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{{-- {!! $data->render() !!} --}}





@endsection
