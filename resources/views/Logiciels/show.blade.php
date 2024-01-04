@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Logiciel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('logiciels.index') }}"> Back </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code_logiciel:</strong>
                {{ $logiciel->code_logiciel }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date_création:</strong>
                {{ $logiciel->date_création }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Model:</strong>
                {{ $logiciel->Model }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>SerialNumber:</strong>
                {{ $logiciel->SerialNumber }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Manufacturer:</strong>
                {{ $logiciel->Manufacturer }}
            </div>
        </div>

    </div>
@endsection
