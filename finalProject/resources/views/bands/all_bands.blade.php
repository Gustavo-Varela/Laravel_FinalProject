@extends('layouts.main');
@section('content');

<div class="tableHeader">
    <div style="width: 200px">

    </div>
    <h1>Todos os Artistas</h1>
    <div style="width: 200px">
        @auth()
            @if(Auth::user()->status == 'admin')
                <a href="{{ route('addBand') }}" class="btn btn-info">Adicionar Artista</a>
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
        <th scope="col">data de formação</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($bands as $band)
        <tr>
            <th scope="row">{{ $band->id }}</th>
            <td><img src="{{ $band->image_path ? asset('storage/' .$band->photp) : asset('images/nophoto.jfif') }}"></td>
            <td>{{ $band->name }}</td>
            <td>{{ $band->year_formed }}</td>
            <td>
                <a href="{{ route('viewBandAlbums', $band->id) }}" class="btn btn-info">Ver albuns</a>
            </td>

            @if (Route::has('login'))
                @auth
                    <td>
                        <a href="{{ route('viewBand', $band->id) }}" class="btn btn-info">Editar Artista</a>
                        @if(Auth::user()->status == 'admin')
                            <a href="{{ route('deleteBand', $band->id) }}" type="button" class="btn btn-danger">Apagar</a>
                        @endif

                    </td>
                @else
                @endauth
            @endif

        </tr>
    @endforeach

    </tbody>
</table>

@endsection
