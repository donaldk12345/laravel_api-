@extends('layouts.app')
@section('content')
<h1 class="text-center">Voici mes articles </h1>
<br>
<div class="container">
    <div class="row">
@foreach ( $blogs as $blog)
<div class="card  bg-light" style="width: 17rem; margin:5px;">
    <div class="card-title">
<h2 class="text-center mt-2 text-dark"> {{ $blog->titre }} </h2>
</div>
<div class="card-body">
<p> {{  $blog->contenu }} </p>
<hr>
<a href="/blog/{{$blog->id}}/edit" class="btn btn-secondary btn-sm"> Editer</a>&nbsp;&nbsp;<a href="#" class="btn btn-danger btn-sm">Suprimer</a>
</div>
</div>


@endforeach
</div>
</div>

@endsection
