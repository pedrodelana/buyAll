@extends('layout.layout')
<link rel="stylesheet" href="/css/auth_general.css">

@section('content')
    <div class="container box col-md-3">
        <h3 align="center">Login</h3>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        <form action=" {{route('auth.user')}} " method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" />
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" name="password" class="form-control" />
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <br>
            <p>Se não tem conta, <a href="/">registrar-se</a></p>
        </form>
    </div>
@endsection
