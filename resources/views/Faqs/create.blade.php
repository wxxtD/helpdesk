@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary mb-2" href="{{ route('faqs.index') }}"> Retour </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Something went wrong.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('faqs.store') }}" method="POST">
    	@csrf

         <div class="row">

		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Description de problem:</strong>
		            <textarea class="form-control" style="height:150px" name="problem" placeholder="description de problem"></textarea>
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Description de solution:</strong>
		            <textarea class="form-control" style="height:150px" name="solution" placeholder="description de solution"></textarea>
		        </div>
		    </div>


            <input type="text" name="user_id" id="user_id" hidden value="{{ auth()->user()->id}}">
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>

    </form>
@endsection
