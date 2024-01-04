@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Nouvelle requête</h2>
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

    <form action="{{ route('requetes.store') }}" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row">





            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date de panne:</strong> <br>
                    <input type="date" id="datepanne" name="datepanne" pattern="\d{2}/\d{2}/\d{4}"
                        placeholder="dd/mm/yyyy">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nature de requête:</strong>
                    <select name="nature" id="nature" class="form-control" required>
                        <option value="Incident">Incident</option>
                        <option value="Demande">Demande</option>
                    </select>
                </div>
            </div> <br>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <h2 class="text-center"></h2>
                <div class="form-group">
                    <strong>Type de requête:</strong>
                    <select name="type" id="type" class="form-control" required>
                        <option value="Materielle">Materiele</option>
                        <option value="Logiciel">Logiciele</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" name="description" placeholder="Description"></textarea>
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="request_case">Cas de requête:</label> <br>
                    <input type="text" id="request_case" name="request_case" value="En cours"
                        @if (auth()->user()->hasRole('USER')) readonly @endif>
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

            <div class="container mt-5">
                @error('image')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif








            </div>






            <input type="text" name="user_id" id="user_id" value="{{ auth()->user()->id }}" hidden>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center pt-3">
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </div>
        </div>
    </form>
@endsection
