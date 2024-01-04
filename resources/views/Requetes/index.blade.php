@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Requetes</h2>
            </div>
            <div class="pull-right">
                @can('requete-create')
                    <a class="btn btn-success mb-2" href="{{ route('requetes.create') }}">Crée une nouvelle requete</a>
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
            <th style="width: 100px;">id</th>
            <th style="width: 100px;">Nom</th>
            <th style="width: 100px;">Prenom</th>
            <th style="width: 100px;">Fonction</th>
            <th style="width: 200px;">Date panne</th>
            <th style="width: 100px;">Nature</th>
            <th style="width: 100px;">Type</th>
            <th style="width: 100px;">Description</th>
            <th style="width: 100px;">image</th>

            <th style="width: 100px;">cas de requête</th>
            <th width="450">Action</th>
        </tr>
        @foreach ($requetes as $requete)
            <tr>
                <td>{{ $requete->id }}</td>
                <td>{{ $requete->user->firstname }}</td>
                <td>{{ $requete->user->lastname }}</td>
                <th>{{ $requete->user->fonction }}</th>
                <td>{{ $requete->datepanne }}</td>
                <td>{{ $requete->nature }}</td>
                <td>{{ $requete->type }}</td>
                <td>{{ $requete->description }}</td>
                <td><img src="{{ asset("storage/{$requete->image}") }}" alt="Image" width="200"></td>
                <td>{{ $requete->request_case }}</td>

                <td>
                    <form action="{{ route('requetes.destroy', $requete->id) }}" method="POST">
                        <a class="btn btn-info mb-2" href="{{ route('requetes.show', $requete->id) }}">Voir plus</a>
                        @can('requete-edit')
                            <a class="btn btn-primary mb-2" href="{{ route('requetes.edit', $requete->id) }}">Modifier</a>
                        @endcan
                        <br>
                        @if ($requete->request_case === 'Traité')
                        @can('solution-list')
                        <a class="btn btn-primary"
                        href="{{ route('requetes.solutions.index', $requete->id) }}">Solution</a>
                                {{-- <button type="submit" class="btn btn-primary">Solution</button> --}}
                                {{-- <input type="hidden" name="request_case" value="Traité"> --}}
                        @endcan
                            @else
                        @can('requete-resoudre')
                                <a class="btn btn-primary"
                                    href="{{ route('requetes.solutions.create', $requete->id) }}">Résoudre</a>

                                    @endcan
                            @endif
                        @csrf
                        @method('DELETE')
                        @can('requete-delete')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
