@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Faqs </h2>
            </div>
            @can('faq-create')


            <div class="pull-right">
                <a class="btn btn-success mb-2" href="{{ route('faqs.create') }}"> Creé un nouveau FAQ </a>
            </div>
             @endcan
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
            <th>description de problem</th>
            <th>description de solution</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($faqs as $faq)
	    <tr>
	        <td>{{ $faq->id }}</td>
	        <td>{{ $faq->problem}}</td>
	        <td>{{ $faq->solution}}</td>
	        <td>
                <form action="{{ route('faqs.destroy',$faq->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('faqs.show',$faq->id) }}">Voir plus</a>
                    @can('faq-edit')
                    <a class="btn btn-primary" href="{{ route('faqs.edit',$faq->id) }}">Modifier</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('faq-delete')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>

    {!! $faqs   ->links() !!}

@endsection
