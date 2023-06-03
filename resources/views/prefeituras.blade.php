@extends('layouts.main')

@section('title','Prefeituras')

@section('content')

    <div class="container">
        <h1>Prefeituras</h1>

        <form method="GET">
            <div class="form-group row">
                <label for="uf" class="col-sm-2 col-form-label">UF:</label>
                <div class="col-sm-4">
                    <select name="uf" id="uf" class="form-control">
                        <option value="">Todos</option>
                        @foreach($ufs as $ufItem)
                            <option value="{{ $ufItem->UF }}"{{ $ufItem->UF == request('uf') ? ' selected' : '' }}>{{ $ufItem->UF }}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
            
            <div class="form-group row">
                <label for="cidade" class="col-sm-2 col-form-label">Cidade:</label>
                <div class="col-sm-4">
                    <select name="cidade" id="cidade" class="form-control">
                        <option value="">Todas</option>
                        @if ($uf)
                            @foreach ($cidades as $cidadeItem)
                                <option value="{{ $cidadeItem }}"{{ $cidadeItem == request('cidade') ? ' selected' : '' }}>{{ $cidadeItem }}</option>
                            @endforeach
                        @else
                            @foreach ($cidades as $uf => $cidadesByUf)
                                <optgroup label="{{ $uf }}">
                                    @foreach ($cidadesByUf as $cidadeItem)
                                        <option value="{{ $cidadeItem }}" data-uf="{{ $uf }}"{{ $cidadeItem == request('cidade') ? ' selected' : '' }}>{{ $cidadeItem }}</option>
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
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Cidade</th>
                    <th>UF</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prefeituras as $prefeitura)
                    <tr>
                        <td>{{ $prefeitura->NOME_A }}</td>
                        <td>{{ $prefeitura->CPF }}</td>
                        <td>{{ $prefeitura->CIDADE }}</td>
                        <td>{{ $prefeitura->UF }}</td>
                        <td>
                            <a href="/portaldados/public/user-prefeitura/{{ $prefeitura->NOME_A }}">Ver mais</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <ul class="pagination">
            @if ($prefeituras->lastPage() > 10)
                <li class="page-item"><a class="page-link" href="{{ $prefeituras->appends(['cidade' => $cidade ?? '', 'uf' => $uf ?? ''])->url(1) }}">Primeira</a></li>
                <li class="page-item"><a class="page-link" href="{{ $prefeituras->appends(['cidade' => $cidade ?? '', 'uf' => $uf ?? ''])->previousPageUrl() }}">Anterior</a></li>
        
                @for ($i = max(1, $prefeituras->currentPage() - 5); $i <= min($prefeituras->lastPage(), $prefeituras->currentPage() + 5); $i++)
                    <li class="page-item {{ ($prefeituras->currentPage() == $i) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $prefeituras->appends(['cidade' => $cidade ?? '', 'uf' => $uf ?? ''])->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
        
                <li class="page-item"><a class="page-link" href="{{ $prefeituras->appends(['cidade' => $cidade ?? '', 'uf' => $uf ?? ''])->nextPageUrl() }}">Próxima</a></li>
                <li class="page-item"><a class="page-link" href="{{ $prefeituras->appends(['cidade' => $cidade ?? '', 'uf' => $uf ?? ''])->url($prefeituras->lastPage()) }}">Última</a></li>
            @endif
        </ul>
        
        
    </div>

    <style>
         .pagination{
            padding: 10px;
            max-height: 500px; /* Defina a altura máxima da lista de carros */
            overflow-y: auto; 
            list-style-type: none;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .pagination li {
                margin: 0 5px;
            }
        .w-5{
            display:none;
        }
        .passar{
            padding: 10px;
        }
    </style>
@endsection
