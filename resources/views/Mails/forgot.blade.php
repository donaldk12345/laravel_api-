@extends('layouts.app')

@section('content')

<h2>change your password : &nbsp; <a href="http://localhost:8000/api/reset/{{$token}}"> reset now !</a> </h2>

@endsection