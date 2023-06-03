@extends('layouts.main')

@section('title','Carros')


@section('content')
    <?php
            $Vendedores='';
            foreach ($carros as $value) {
                $Vendedores.="$value->Vendedor";
                $Vendedores.=',';
            }
            $a=explode(",",$Vendedores);
            $distinct = array_unique($a);
    ?>
  <div class="container">
    <h2 class="text-center mb-4">Vendedores e Quantidades</h2>

    <form method="GET">
        <div class="row">
            <div class="col-md-4">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="telefone" id="telefone" value="true" @if(request('telefone')) checked @endif>
                    <label class="form-check-label" for="telefone">Filtrar por telefone</label>
                </div>
                <div class="form-group mt-2">
                    <label for="origem">Filtrar por origem:</label>
                    <select name="origem" id="origem" class="form-control">
                        <option value="">Selecionar</option>
                        <option value="FB" @if(request('origem') == 'FB') selected @endif>Facebook</option>
                    
                        <option value="OLX" @if(request('origem') == 'OLX') selected @endif>OLX</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary mt-4">Filtrar</button>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-md-6"><strong>Nome vendedor</strong></div>
        <div class="col-md-6"><strong>Quantidade</strong></div>
    </div>
    @foreach($carros as $result)
        <div class="row">
            <div class="col-md-6">
                <a href="mostradados?nome={{ $result->vendedor }}">{{ $result->vendedor }}</a>
            </div>
            <div class="col-md-6">{{ $result->qtd_carros }}</div>
        </div>
    @endforeach
    <ul class="pagination">
        @if ($carros->lastPage() > 1)
            <li class="{{ ($carros->currentPage() == 1) ? 'disabled' : '' }}">
                <a href="{{ $carros->appends(request()->query())->url(1) }}">Primeira</a>
            </li>
            <li class="{{ ($carros->currentPage() == 1) ? 'disabled' : '' }}">
                <a href="{{ $carros->appends(request()->query())->previousPageUrl() }}">Anterior</a>
            </li>
    
            @for ($i = 1; $i <= $carros->lastPage(); $i++)
                @if ($i >= $carros->currentPage() - 2 && $i <= $carros->currentPage() + 2)
                    <li class="{{ ($carros->currentPage() == $i) ? 'active' : '' }}">
                        <a href="{{ $carros->appends(request()->query())->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor
    
            <li class="{{ ($carros->currentPage() == $carros->lastPage()) ? 'disabled' : '' }}">
                <a href="{{ $carros->appends(request()->query())->nextPageUrl() }}">Próxima</a>
            </li>
            <li class="{{ ($carros->currentPage() == $carros->lastPage()) ? 'disabled' : '' }}">
                <a href="{{ $carros->appends(request()->query())->url($carros->lastPage()) }}">Última</a>
            </li>
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
