@extends('layouts.app')


@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Matériel</h2>
            </div>
            <div class="pull-right">
                @can('materiel-create')
                <a class="btn btn-success" href="{{ route('materiels.create') }}"> Créer un nouveau matériel </a>
                @endcan
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
            <th>Code</th>
            <th>Nom</th>
            <th>Marque</th>
            <th>Type</th>
            <th>Num</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($materiels as $materiel)
	    <tr>
            <td>{{ $materiel->id}}</td>
	        <td>{{ $materiel->code}}</td>
            <td>{{ $materiel->nom }}</td>
	        <td>{{ $materiel->marque }}</td>
	        <td>{{ $materiel->type }}</td>
            <td>{{ $materiel->num }}</td>
	        <td>
                <form action="{{ route('materiels.destroy',$materiel->code) }}" method="POST">
                    <a class="btn btn-info mb-2" href="{{ route('materiels.show',$materiel->code) }}">Voir plus</a>
                    @can('materiel-edit')
                    <a class="btn btn-primary mb-2" href="{{ route('materiels.edit',$materiel->code) }}">Modifier</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('materiel-delete')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

    {!! $materiels   ->links() !!}



@endsection
