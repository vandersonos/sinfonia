
@extends('layout')
@section('main')
<div class="container mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/users">Usuários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Remover</li>
        </ol>
    </nav>
    <div class="card mb-2">
        <div class="row g-0">
            <div class='alert '>
                Tem certeza que deseja deletar <?= $user['name'] ?> e todas as suas informações?
            </div>
            <form method="POST" action="/users/<?= $user['id'] ?>">
                @method('DELETE')
                @csrf
                <button class="btn btn-outline-success" type="submit">Comfirmar e remover</button>
                <a href="/users" class="btn btn-primary">Cancelar</a>
            </form>
        </div>
    </div>
    </nav>
    <div class="card mb-2">
        <div class="row g-0">
            <div class="col-md-4 p-2 d-flex justify-content-center">
                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" style="width:200px" class="card-img-top" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Dados Pessoais</h5>
                    
                    <p class="card-text">
                    <div><b>Nome:</b> <?= $user['name']?></div>
                    <div><b>E-mail:</b> <?= $user['email']?></div>
                    </p>
                </div>
            </div>
    </div>
    </div>
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title">Músicas Favoritas</h5>
            <table class="table">
                <thead>

                    <tr>
 
                    <th scope="col">Título</th>
                    <th scope="col">Banda/cantor</th>
                    <th scope="col">Lançamento</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Favoritada</th>
                    <th scope="col">Inserção</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user['favorites'] as $m): ?>
                    <tr>

                        <td><?= $m['title'] ?></td>
                        <td><?= $m['singer'] ?></td>
                        <td><?= $m['release_date'] ?></td>
                        <td><?= $m['type'] ?></td>
                        <td><span class="badge bg-secondary"><?= $m['favorited_stats'] ?> curtidas</span></td>
                        <td><?= $m['date_inserted'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>
@endsection
