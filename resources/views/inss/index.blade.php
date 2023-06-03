@extends('layouts.main')

@section('title', 'INSS')

@section('content')

<div class="container">
    <h1>INSS</h1>

    <form method="GET">
        <div class="form-group row">
            <label for="uf" class="col-sm-2 col-form-label">UF:</label>
            <div class="col-sm-4">
                <select name="uf" id="uf" class="form-control">
                    <option value="">Todos</option>
                    @foreach($ufs as $uf)
                        <option value="{{ $uf }}"{{ $uf == $ufFilter ? ' selected' : '' }}>{{ $uf }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="municipio" class="col-sm-2 col-form-label">Município:</label>
            <div class="col-sm-4">
                <select name="municipio" id="municipio" class="form-control">
                    <option value="">Todos</option>
                    @if ($ufFilter)
                        @foreach ($municipios as $municipioItem)
                            <option value="{{ $municipioItem }}"{{ $municipioItem == $municipioFilter ? ' selected' : '' }}>{{ $municipioItem }}</option>
                        @endforeach
                    @else
                        @foreach ($municipios as $uf => $municipiosByUf)
                            <optgroup label="{{ $uf }}">
                                @foreach ($municipiosByUf as $municipioItem)
                                    <option value="{{ $municipioItem }}" data-uf="{{ $uf }}"{{ $municipioItem == $municipioFilter ? ' selected' : '' }}>{{ $municipioItem }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Nome Segurado</th>
                <th>CPF</th>
                <th>Município</th>
                <th>UF</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inss as $item)
                <tr>
                    <td>{{ $item->nome_segurado }}</td>
                    <td>{{ $item->nu_CPF }}</td>
                    <td>{{ $item->municipio }}</td>
                    <td>{{ $item->uf }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $inss->appends(request()->query())->links() }}
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ufSelect = document.getElementById('uf');
        var municipioSelect = document.getElementById('municipio');
        var municipiosByUf = {!! json_encode($municipios) !!};

        ufSelect.addEventListener('change', function () {
            var selectedUf = ufSelect.value;
            var municipios = municipiosByUf[selectedUf] || [];

            municipios.sort(); // Ordenar as cidades em ordem alfabética

            municipioSelect.innerHTML = '<option value="">Todos</option>';

            municipios.forEach(function (municipio) {
                var option = document.createElement('option');
                option.value = municipio;
                option.text = municipio;
                if (municipio === '{{ $municipioFilter }}') {
                    option.selected = true;
                }
                municipioSelect.appendChild(option);
            });
        });

        // Atualizar as opções de município quando a página for carregada
        var selectedUf = ufSelect.value;
        var municipios = municipiosByUf[selectedUf] || [];

        municipios.sort(); // Ordenar as cidades em ordem alfabética

        municipios.forEach(function (municipio) {
            var option = document.createElement('option');
            option.value = municipio;
            option.text = municipio;
            if (municipio === '{{ $municipioFilter }}') {
                option.selected = true;
            }
            municipioSelect.appendChild(option);
        });
    });
</script>


<style>
     .w-5{
        display:none;
    }
</style>
@endsection
