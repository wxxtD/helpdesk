@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">


                <h2>Modifier une requête</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary mb-2" href="{{ route('requetes.index') }}"> Retour </a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Quelque chose s'est mal passé.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('requetes.update', $requete->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        @csrf

        <div class="row">





            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date panne:</strong> <br>
                    <input type="date" id="datepanne" name="datepanne" pattern="\d{2}/\d{2}/\d{4}"
                        placeholder="dd/mm/yyyy" @if (!auth()->user()->hasRole('USER')) readonly @endif>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nature:</strong>
                    <select name="nature" id="nature" class="form-control" value="{{ $requete->nature }}"
                        @if (!auth()->user()->hasRole('USER')) readonly @endif>
                        <option value="incident" @if ($requete->type == 'incident') selected @endif>Incident</option>
                        <option value="demande">Demande</option>
                    </select>
                </div>
            </div> <br>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <h2 class="text-center"></h2>
                <div class="form-group">
                    <strong>Type:</strong>
                    <select name="type" id="type" class="form-control" value="{{ $requete->type }}"
                        @if (!auth()->user()->hasRole('USER')) readonly @endif>
                        <option value="Materielle" @if ($requete->type == 'Materielle') selected @endif>Matérielle</option>
                        <option value="Logiciel" @if ($requete->type == 'Logiciel') selected @endif>Logiciel</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" class="form-control" name="description" value="{{ $requete->description }}"
                        placeholder="description" @if (!auth()->user()->hasRole('USER')) readonly @endif>
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cas de requête:</strong>

                    <select name="request_case" id="request_case" class="form-control" value="{{ $requete->request_case }}"
                        @if (!auth()->user()->hasRole('USER')) readonly @endif>

                        <option value="Traité" {{ $requete->request_case === 'Traité' ? 'selected' : '' }}>Traité</option>
                        <option value="En cour"
                            {{ $requete->request_case === 'En cours' ? 'selected' : '' }}>En cours</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="file" name="image" placeholder="Choose image" id="image">
                    @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <input type="text" name="user_id" id="user_id" value="{{ auth()->user()->id }}" hidden>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-3">
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </div>
        </div>


    </form>

@endsection
