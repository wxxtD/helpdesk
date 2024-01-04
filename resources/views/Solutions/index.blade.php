@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Solutions </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary mb-2" href="{{ route('requetes.index') }}"> Retour </a>
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
            <th>ID</th>
            <th>Surnom d'utilisateur</th>
            <th>Requete id</th>
            <th>description</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($solutions as $solution)
	    <tr>
	        <td>{{ $solution->id }}</td>
	        <td>{{ $solution->user->name }}</td>
	        <td>{{ $solution->requete_id }}</td>
            <td>{{ $solution->description }}</td>
	        <td>
                <form action="{{ route('solutions.destroy',$solution->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('solutions.show',$solution->id) }}">Voir plus</a>
                    @can('solution-edit')
                    <a class="btn btn-primary" href="{{ route('solutions.edit',$solution->id) }}">Modifier</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('solution-delete')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

    {!! $solutions   ->links() !!}

@endsection
