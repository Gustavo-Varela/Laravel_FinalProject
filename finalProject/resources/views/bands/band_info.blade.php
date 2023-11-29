@extends('layouts.main')

@section('content')

    <h2>{{ $band->name }}</h2>

    <img width="500" height="500" src="{{ $band->image_path ? asset('storage/' .$band->photp) : asset('images/nophoto.jfif') }}">

    <h4>Ano de formação: {{ $band->year_formed }}</h4>

@endsection
