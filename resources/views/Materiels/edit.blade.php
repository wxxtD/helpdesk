@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">


                <h2>Modifier les informations</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('materiels.index') }}">Retour</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong>Quelque chose s'est mal passé.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('materiels.update',$materiels->id) }}" method="POST">
    	@csrf
        @method('PUT')

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Code SH:</strong>
                    <div class="form-group">
                        <input id="code" type="text" name="code" class="form-control" placeholder="Code SH">
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom équip:</strong>
                    <div class="form-group">
                        <input id="nom" type="text" name="nom" class="form-control" placeholder="Nom equipment">
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Marque équip:</strong>
                    <input id="marque" type="text" name="marque" class="form-control" placeholder="Marque equip">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Type équip:</strong>
                    {{-- <input id="type" type="text" name="type" class="form-control" placeholder="Type equip"> --}}
                    <select id="type" name="type" class="form-control">
                        <option value="Ordinateurs">Ordinateurs</option>
                        <option value="Réseau">Réseau</option>
                        <option value="Périphériques de stockage">Périphériques de stockage</option>
                        <option value="Périphériques">Périphériques</option>
                        <option value="InfrastructureDeServeur">Infrastructure de serveur</option>
                        <option value="Telecommunication">Équipement de télécommunication</option>
                        <option value="Alimentation">Gestion de l'alimentation</option>
                        <option value="wécurite">Matériel de sécurité</option>
                        <option value="Logiciel">Logiciel</option>
                        <option value="Cdd">Infrastructure du centre de données</option>
                        <option value="SR">Sauvegarde et récupération</option>
                        <option value="Virtualisation">Infrastructure de virtualisation</option>
                        <option value="cloud">Infrastructure cloud</option>
                        <option value="Omg">Outils de magasinage et de gestion</option>
                        <option value="Audio_VisualEquipment">Audio-Visual Equipment</option>
                        <option value="AccessEquipment">Équipement d'accès à distance</option>
                        <option value="ITAccessories">IT Accessoires</option>


                    </select>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Num série equip:</strong>
                    <input type="text" name="num" class="form-control" placeholder="Num série equip">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


    </form>

@endsection
