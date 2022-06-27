
@extends('layout')
@section('main')
<div class="container mt-2">
<form method="POST" action="/users">

    @csrf
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/users">Usuários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
        </ol>
    </nav>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card mb-2">
        <div class="row g-0">
            <div class="col-md-4 p-2 d-flex justify-content-center">
                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" style="width:200px" class="card-img-top" alt="...">
            </div>
            <div class="col-md-8 m-auto px-4">
                <div class="mb-3">
                        <label for="photo" class="form-label">Foto de perfil</label>
                        <input type="file" class="form-control" id="photo" name="photo" placeholder="">
                </div>
            </div>
        </div>
        <div class="row g-0">
            <div class="col p-2 d-flex justify-content-center">

                <div class="card-body">
                    <h5 class="card-title">Dados Pessoais</h5>
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control @error('title', 'post') is-invalid @enderror" id="name" name="name" placeholder="" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control @error('title', 'post') is-invalid @enderror" id="email" name="email" placeholder="name@example.com"  value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control @error('title', 'post') is-invalid @enderror" id="password" name="password"   value="{{ old('password') }}">
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="mb-3">
                        <label for="password_confirm" class="form-label">Confirmação de senha</label>
                        <input type="password" class="form-control @error('title', 'post') is-invalid @enderror" id="password_confirm" name="password_confirm"  value="{{ old('password_confirm') }}">
                    </div>
                    @error('password_confirm')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            
            <input class="btn btn-primary" type="submit" value="Cadastrar">
            <a href="/users" class="btn btn-primary">Cancelar</a>
        </div>
    </div>
    </form>
</div>
@endsection
