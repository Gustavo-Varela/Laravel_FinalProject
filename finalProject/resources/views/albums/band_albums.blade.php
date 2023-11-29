@extends('layouts.main');
@section('content');


<div class="tableHeader">
    <img src="{{ $band->image_path ? asset('storage/' .$band->photp) : asset('images/nophoto.jfif') }}">
    <h1>Albuns de {{$band->name}}</h1>
    <div style="width: 200px">
        @auth()
            @if(Auth::user()->status == 'admin')
                <a href="{{ route('addAlbum') }}" class="btn btn-info">Adicionar Album</a>
           @endif
        @endauth
    </div>
</div>



<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col"></th>
        <th scope="col">Nome</th>
        <th scope="col">data de lançamento</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($albums as $album)
        <tr>
            <th scope="row">{{ $album->id }}</th>
            <td><img src="{{ $album->image_path ? asset('storage/' .$band->photp) : asset('images/nophoto.jfif') }}"></td>
            <td>{{ $album->name }}</td>
            <td>{{ $album->year_released }}</td>
                @if (Route::has('login'))
                    @auth
                    <td>
                        <a href="{{ route('viewAlbum', $album->id) }}" class="btn btn-info">Editar Album</a>
                        @if(Auth::user()->status == 'admin')
                            <a href="{{ route('deleteAlbum', $album->id) }}" type="button" class="btn btn-danger">Apagar</a>e
                        @endif
                    </td>
                @endauth
                @endif
        </tr>
    @endforeach

    </tbody>
</table>

@endsection
