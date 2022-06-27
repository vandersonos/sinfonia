
@extends('layout')
@section('main')
<div class="container mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/medias">Mídias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Remover</li>
        </ol>
    </nav>
    <div class="card mb-2">
        <div class="row g-0">
            <div class='alert '>
                Tem certeza que deseja deletar <?= $media['title'] ?> e todas as suas informações?
            </div>
            <div class="mb-3 px-4">
            <form method="POST" action="/medias/<?= $media['id'] ?>">
                @method('DELETE')
                @csrf
                <button class="btn btn-outline-success" type="submit">Confirmar e remover</button>
                <a href="/medias" class="btn btn-primary">Cancelar</a>
            </form>
        </div>
        </div>
    </div>
    </nav>
    
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">Detalhes</h5>
            
            <p class="card-text">
            <div><b>Título:</b> <?= $media['title']?></div>
            <div><b>Banda/cantor:</b> <?= $media['singer']?></div>
            <div><b>Genero:</b> <?= $media['type']?></div>
            <div><b>Lançamento:</b> <?= $media['release_date']?></div>
            <div><b>Cadastrada:</b> <?= $media['inserted_date']?></div>
            <div><b>Favoritada:</b> <?= $media['favorites_count']?> vezes</div>
            </p>
        </div>
    </div>
</div>
@endsection
