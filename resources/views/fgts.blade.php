@extends('layouts.main')

@section('title','FGTS')

@section('content')
<div class="container">
    
    <h1>Lista de FGTS</h1>

    <form method="GET" action="{{ route('fgts.index') }}">
        <div class="form-group row">
            <label for="cidade" class="col-md-4 col-form-label text-md-right">Filtrar por cidade:</label>

            <div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="uf">UF:</label>
                        <select name="uf" id="uf" class="form-control">
                            <option value="">Todos</option>
                            @foreach ($ufs as $ufRow)
                                <option value="{{ $ufRow->uf }}" @if ($uf == $ufRow->uf) selected @endif>{{ $ufRow->uf }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="cidade">Cidade:</label>
                        <select name="cidade" id="cidade" class="form-control">
                            <option value="">Todas</option>
                            @if ($uf)
                                @foreach ($cidades->get($uf, collect()) as $cidadeRow)
                                    <option value="{{ $cidadeRow }}" @if (session('cidadeSelecionada') == $cidadeRow) selected @endif>{{ $cidadeRow }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>

    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Cidade</th>
                <th>CPF</th>
                <th>PIS</th>
                <th>Saldo</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($fgts as $fgtsItem)
                <tr>
                    <td>{{ $fgtsItem->id }}</td>
                    <td>{{ $fgtsItem->nome }}</td>
                    <td>{{ $fgtsItem->cidade }}</td>
                    <td>{{ $fgtsItem->CPF2 }}</td>
                    <td>{{ $fgtsItem->pis }}</td>
                    <td>{{ $fgtsItem->saldo }}</td>
                    <td>
                        <a href="/portaldados/public/user-fgts/{{ $fgtsItem->nome }}">Ver mais</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Nenhum registro encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- <div class="d-flex justify-content-center">
        {{ $fgts->appends(['cidade' => session('cidadeSelecionada'), 'uf' => $uf])->links() }}
    </div> --}}
    
    <ul class="pagination">
        @if ($fgts->lastPage() > 10)
            <li class="page-item"><a class="page-link" href="{{ $fgts->appends(['cidade' => session('cidadeSelecionada')])->url(1) }}">Primeira</a></li>
            <li class="page-item"><a class="page-link" href="{{ $fgts->appends(['cidade' => session('cidadeSelecionada')])->previousPageUrl() }}">Anterior</a></li>
    
            @for ($i = max(1, $fgts->currentPage() - 5); $i <= min($fgts->lastPage(), $fgts->currentPage() + 5); $i++)
                <li class="page-item {{ ($fgts->currentPage() == $i) ? 'active' : '' }}">
                    <a class="page-link" href="{{ $fgts->appends(['cidade' => session('cidadeSelecionada')])->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
    
            <li class="page-item"><a class="page-link" href="{{ $fgts->appends(['cidade' => session('cidadeSelecionada')])->nextPageUrl() }}">Próxima</a></li>
            <li class="page-item"><a class="page-link" href="{{ $fgts->appends(['cidade' => session('cidadeSelecionada')])->url($fgts->lastPage()) }}">Última</a></li>
        @endif
    </ul>
    
    
</div>
<script>
    $(document).ready(function() {
        // Seleciona a cidade previamente selecionada
        var cidade = "{{ old('cidade') }}";
        $('#cidade').val(cidade);
        
        // Salva o valor selecionado na sessão
        $('#cidade').on('change', function() {
            var cidadeSelecionada = $(this).val();
            $.ajax({
                url: "{{ route('fgts.cidade') }}",
                type: "POST",
                data: {
                    cidade: cidadeSelecionada,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });

        // Recupera o valor selecionado da sessão
        var cidadeSelecionada = "{{ session('cidadeSelecionada') }}";
        if (cidadeSelecionada) {
            $('#cidade').val(cidadeSelecionada);
        }
    });
</script>
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
