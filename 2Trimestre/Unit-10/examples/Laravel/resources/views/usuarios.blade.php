@extends('layouts.basic')

@section('titulo', $titulo )

@section('content')
<h1>{{$titulo}}</h1>
<ul>
    @foreach($usuarios as $user)
        <li>{{$user}}</li>
    @endforeach
</ul>
@endsection