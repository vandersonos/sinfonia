
@extends('layout')
@section('main')
<div class="container mt-2">
<form method="POST" action="/medias">

    @csrf
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/medias">Mídia</a></li>
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
            <div class="col p-2 d-flex justify-content-center">

                <div class="card-body">
                    <h5 class="card-title">Mídia</h5>
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Título</label>
                        <input type="text" class="form-control @error('title', 'post') is-invalid @enderror" id="title" name="title" placeholder="" value="{{ old('title') }}">
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="mb-3">
                        <label for="singer" class="form-label">Banda/Cantor</label>
                        <input type="text" class="form-control @error('singer', 'post') is-invalid @enderror" id="singer" name="singer"   value="{{ old('singer') }}">
                    </div>
                    @error('singer')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="singer" class="form-label">Genero</label>
                        <select class="form-select" name='type' aria-label="select o genero musical">
                            @foreach ($generos as $genero)
                                <option value='{{$genero}}'>{{$genero}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="release_date" class="form-label">Lançamento</label>
                        <input type="text" class="w-25 form-control @error('release_date', 'post') is-invalid @enderror" id="release_date" name="release_date"  value="{{ old('release_date') }}">
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
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            
            <input class="btn btn-primary" type="submit" value="Cadastrar">
            <a href="/medias" class="btn btn-primary">Cancelar</a>
        </div>
    </div>
    </form>
</div>
@endsection
