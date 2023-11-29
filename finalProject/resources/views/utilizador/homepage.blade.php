@extends('layouts.main');
@section('content');

<br>
<hr>
<br>

<h1>Utilizador</h1>
<br>

<h2>Nome: {{}}</h2>
<h2>Email: {{}}</h2>
<h2>Saldo: {{}}</h2>

<br>
<hr>
<br>

<h1>movimentos</h1>
<br>

@foreach($users as $user)
    <h2>
        {{ $user->nome }}
    </h2>
    
@endforeach



<br><br>
@endsection
