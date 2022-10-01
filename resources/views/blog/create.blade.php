@extends('layouts.app')
@section('content')
<h1 class="text-center">creer les articles </h1>
<br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-6  p-3">
          <form action=" {{route('save')}} " method="POST">
            @csrf
           <div class="form-group">
           {!! Form::label("Titre","Titre") !!}
           {!! Form::text("titre",null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label("Contenu","Contenu") !!}
            {!! Form::textarea("contenu",null, ['class'=>'form-control']) !!}
         </div>
         <div class="form-group">
            {!! Form::submit("Créer article", ['class'=>'btn btn-primary']) !!}
         </div>
        </div>
    </form>
    </div>
</div>


@endsection
