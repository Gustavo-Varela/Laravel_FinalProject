@extends('layouts.main')

@section('content')


    <div class="container">

        @if (isset($album))
            <h2>Editar o album {{ $album->name }}</h2>
        @else
            <h2>Adicionar album</h2>
        @endif


        <form method="POST" action="{{ route('storeAlbum') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="album_id" value="{{ isset($album) ? $album->id : null }}">

            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input name="name" value="{{ isset($album) ? $album->name : '' }}" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" required>
                @error('name')
                Pf coloque um nome
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEsCost" class="form-label">Data de lançamento</label>
                <input name="year_released"
                       value="{{ isset($album) ? $album->year_released : '' }}" type="date" class="form-control"
                       id="exampleInputEC" aria-describedby="emailHelp" required>
                @error('eCost')
                <div class="invalid-feedback"> Pf coloque o ano de lançamento</div>
                @enderror
            </div>
            <div class="mb-3">
                <select class="custom-select" name="band">
                    <option value=""  disabled selected>Selecionar a Banda</option>
                    @foreach($bands as $band)
                        <option value="{{ $band->id }}" @if(isset($album))
                            @if($band->id == $album->band) selected @endif
                            @endif>
                            {{$band->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image_path" class="form-label">Capa do album</label>
                <input type="file" name="image_path" accept="image/*" id="image_path"
                       class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($album) ? 'Update' : 'Submit' }}</button>
        </form>
    </div>

@endsection
