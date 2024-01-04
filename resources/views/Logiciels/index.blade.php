@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Logiciel</h2>
            </div>
            <div class="pull-right">
                @can('logiciel-create')
                    <a class="btn btn-success" href="{{ route('logiciels.create') }}"> Créer un nouveau logiciel </a>
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

            <th>Nom</th>
            <th>Code de logiciel</th>
            <th>Date de creation</th>
            <th>Licence</th>
            <th>Version</th>
            <th>Code de configuration</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($logiciels as $logiciel)
            <tr>
                <td>{{ $logiciel->nom }}</td>
                <td>{{ $logiciel->code }}</td>
                <td>{{ $logiciel->date_creation }}</td>
                <td>{{ $logiciel->licence }}</td>
                <td>{{ $logiciel->version }}</td>
                <td>{{ $logiciel->code_config }}</td>
                <td>
                    <form action="{{ route('logiciels.destroy', $logiciel->id) }}" method="POST">
                        <a class="btn btn-info mb-2" href="{{ route('logiciels.show', $logiciel->id) }}">Voir plus</a>
                        @can('logiciel-edit')
                            <a class="btn btn-primary mb-2" href="{{ route('logiciels.edit', $logiciel->id) }}">Modifier</a>
                        @endcan


                        @csrf
                        @method('DELETE')
                        @can('logiciel-delete')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $logiciels->links() !!}
@endsection
