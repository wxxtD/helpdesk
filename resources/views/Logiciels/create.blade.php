@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Nouveau Logiciel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary mb-2" href="{{ route('logiciels.index') }}"> Retour </a>
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

    <form action="{{ route('logiciels.store') }}" method="POST">
        @csrf

        <div class="row">




            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom:</strong>
                    <input id="nom" type="text" name="nom" class="form-control" placeholder="Nom">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Code logiciel:</strong>
                    <div class="form-group">
                        <input id="code" type="text" name="code" class="form-control" placeholder="Code_logiciel">
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date_création:</strong>
                    <div class="form-group">
                        <input id="date_création" type="date" name="date_creation" class="form-control" placeholder="Nom equipment">
                    </div>
                </div>
            </div>





            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Licence:</strong>
                    {{-- <input id="type" type="text" name="type" class="form-control" placeholder="Type equip"> --}}
                    <select id="licence" name="licence" class="form-control">
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
                    <strong>Version:</strong>
                    <input type="text" name="version" class="form-control" placeholder="Version">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Code_configuration:</strong>
                    <input type="text" name="code_config" class="form-control" placeholder="Code_configuration">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 pull-left">
                <button type="submit" class="btn btn-primary pull-left">Submit</button>
            </div>
        </div>

    </form>
@endsection
