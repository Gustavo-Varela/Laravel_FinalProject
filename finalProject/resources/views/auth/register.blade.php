@extends('layouts.main')

@section('content')
    <div class="container">

        <h2>Registar novo utilizador</h2>

        <form method="POST" action="{{ route('storeUser') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="user_id" value="">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input name="name" value="" type="text" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" required>
                @error('name')
                Pf coloque um nome
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email"
                       value="" type="email" class="form-control"
                       id="exampleInputEmail1" aria-describedby="emailHelp" required>
                @error('email')
                <div class="invalid-feedback"> Pf coloque um email</div>
                @enderror
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" value="" type="password"
                       class="form-control" id="exampleInputPassword1" required>
                @error('password')
                <div class="alert-danger">
                    Pelo menos 6 caracteres
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
