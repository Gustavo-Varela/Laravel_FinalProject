@extends('layouts.main')

@section('content')


    <div class="container">

        @if (isset($band))
            <h2>Editar Artista {{ $band->name }}</h2>
        @else
            <h2>Adicionar Artista</h2>
        @endif


        <form method="POST" action="{{ route('storeBand') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="band_id" value="{{ isset($band) ? $band->id : null }}">

            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input name="name" value="{{ isset($band) ? $band->name : '' }}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" required>
                @error('name')
                Pf coloque um nome
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEsCost" class="form-label">Data de lançamento</label>
                <input name="year_formed"
                       value="{{ isset($band) ? $band->year_formed : '' }}" type="date" class="form-control"
                       id="exampleInputEC" aria-describedby="emailHelp" required>
                @error('eCost')
                <div class="invalid-feedback"> Pf coloque o ano de formação</div>
                @enderror
            </div>
            <input type="hidden" name="created_by" value="1">
            <div class="mb-3">
                <label for="image_path" class="form-label">Imagem do artista</label>
                <input type="file" name="image_path" accept="image/*" id="image_path"
                       class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($album) ? 'Update' : 'Submit' }}</button>
        </form>
    </div>

@endsection
