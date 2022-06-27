
@extends('layout')
@section('main')
<div class="container mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/users">Usuários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista</li>
        </ol>
    </nav>
    <div class="row">
        <div class='col mb-2 mt-2'>
            <form class="d-flex" role="search" action='/users' method='GET'>
                <input class="form-control me-2" type="search" name='search' placeholder="Search" aria-label="Search" value="<?= $filtros ?>">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
                <a href="/users/create" class="btn btn-primary">Adicionar</a>
            </form>
        </div>
    </div>
    @if(!empty($mensagem))
    <div class="alert alert-success">
        {{ $mensagem }}
    </div>
    @endif
    @if($users->isEmpty())
    <div class="alert alert-info">
        Nenhum registro encontrado.
    </div>
    @endif
    <ul class="list-group">
        <?php foreach ($users as $u): ?>
            <li class="list-group-item">
                <div class="row align-items-center justify-content-between">
                    <div class="col">
                        <?= $u['name'] ?> ( <?= $u['email'] ?>)
                    </div>
                    <div class="col">
                        <div class="dropdown float-end">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Configurações
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="/users/<?= $u['id']?>">Abrir</a></li>
                                <li><a class="dropdown-item" href="/users/<?= $u['id']?>/edit">Editar</a></li>
                                <li><a class="dropdown-item" href="/users/<?= $u['id']?>/remove">Remover</a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
            </li>
        <?php endforeach; ?>

    </ul>
    <div class="paginate mt-4">
        <?= $users->links() ?>
   
    </div>
</div>
@endsection
