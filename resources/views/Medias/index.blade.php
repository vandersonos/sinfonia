
@extends('layout')
@section('main')
<div class="container mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/medias">Mídias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista</li>
        </ol>
    </nav>
    <div class="row">
        <div class='col mb-2 mt-2'>
            <form role="search" action='/medias' method='GET'>
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="" value="<?= $title ?>">
                </div>
                <div class="mb-3">
                    <label for="singer" class="form-label">Banda/Cantor</label>
                    <input type="text" class="form-control" id="singer" name="singer" placeholder="" value="<?= $singer ?>">
                </div>
                <div class="mb-3 row">
                    <div class='col-6'>
                        <label for="singer" class="form-label">Banda/Cantor</label>
                        <select class="form-select"  name='type' aria-label="select o genero musical">
                            @foreach ($generos as $genero)
                                <option value='{{$genero}}' <?php echo ($type == $genero ? 'selected':""); ?> >{{$genero}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="release_date" class="form-label">Lançamento</label>
                        <input type="text" class="w-25 form-control @error('release_date', 'post') is-invalid @enderror" id="release_date" name="release_date"  value="<?= $release_date?>">
                    </div>
                    @error('release_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <script type='text/javascript'>
                        window.onload = function() {
                            $.datepicker.regional['pt-BR'] = {
                                closeText: "Fechar",
                                prevText: "&#x3C;Anterior",
                                nextText: "Próximo&#x3E;",
                                currentText: "Hoje",
                                monthNames: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
                                "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ],
                                monthNamesShort: [ "Jan", "Fev", "Mar", "Abr", "Mai", "Jun",
                                "Jul", "Ago", "Set", "Out", "Nov", "Dez" ],
                                dayNames: [
                                    "Domingo",
                                    "Segunda-feira",
                                    "Terça-feira",
                                    "Quarta-feira",
                                    "Quinta-feira",
                                    "Sexta-feira",
                                    "Sábado"
                                ],
                                dayNamesShort: [ "Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb" ],
                                dayNamesMin: [ "Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb" ],
                                weekHeader: "Sm",
                                dateFormat: "dd/mm/yy",
                                firstDay: 0,
                                isRTL: false,
                                showMonthAfterYear: false,
                                yearSuffix: "" 
                            };

                            $('#release_date').datepicker({
                                dateFormat:'dd/mm/yy',
                                dayNamesShort: $.datepicker.regional[ "pt-BR" ].dayNamesShort,
                                dayNames: $.datepicker.regional[ "pt-BR" ].dayNames,
                                monthNamesShort: $.datepicker.regional[ "pt-BR" ].monthNamesShort,
                                monthNames: $.datepicker.regional[ "pt-BR" ].monthNames
                            });
                        };
                        
                    </script>
                    <div class='col-3 py-4'>
                        <label class="form-label"></label>
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                        <a href="/medias/create" class="btn btn-primary">Adicionar</a>
                    </div>
                </div>
             
            </form>
        </div>
    </div>
    @if(!empty($mensagem))
    <div class="alert alert-success">
        {{ $mensagem }}
    </div>
    @endif
    @if($medias->isEmpty())
    <div class="alert alert-info">
        Nenhum registro encontrado.
    </div>
    @endif
    <ul class="list-group">
        <?php foreach ($medias as $u): ?>
            <li class="list-group-item">
                <div class="row align-items-center justify-content-between">
                    <div class="col">
                        <?= $u['title'] ?> ( <?= $u['singer'] ?>)
                    </div>
                    <div class="col">
                        <div class="dropdown float-end">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Configurações
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="/medias/<?= $u['id']?>">Abrir</a></li>
                                <li><a class="dropdown-item" href="/medias/<?= $u['id']?>/edit">Editar</a></li>
                                <li><a class="dropdown-item" href="/medias/<?= $u['id']?>/remove">Remover</a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
            </li>
        <?php endforeach; ?>

    </ul>
    <div class="paginate mt-4">
    <?= $medias->links() ?>
   
    </div>
</div>
@endsection
