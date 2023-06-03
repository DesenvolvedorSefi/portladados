@extends('layouts.main')

@section('title','Principal')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ $vendedor }}</div>
            <div class="card-body">
                <ul>
                    <li>Origem: {{ $origem }}</li>
                    <li>Telefone: {{ $telefone }}</li>
                    @if(isset($resultado[0]->Telefone_Descricao))
                    <li>Outros Telefones: {{ $resultado[0]->Telefone_Descricao }}</li>
                    @endif
        
                    <li>Cidade: {{ $cidade }}</li>
                </ul>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="passar">
                    <button type="button" class="btn btn-success passar">
            
                        WhatsApp
                    </button>
                    <button class="btn btn-info passar"><i class="bi bi-chat-dots"></i>SMS</button>
                    <button class="btn btn-primary passar"><i class="bi bi-envelope"></i>E-MAIL</button>
                    <button class="btn btn-secondary passar"><i class="bi bi-facebook">Facebook</i></button>
            </div>
        </div>
        <br>
        <h3>Links</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Carro</th>
                    <th scope="col">Dia</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Link</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($resultado as $result)
                    <tr>
                        <td class="car-name">{{ $result->Carro }}</td>
                        <td>{{ $result->Dia }}</td>
                        <td>{{ $result->Hora }}</td>
                        <td><a href="{{ $result->Link }}">Link</a></td>
                        <td>
                            <div id="{{ $result->id }}" style="display: inline-block; background-color: {{ $result->status ? 'green' : 'red' }}; width:30px; height:30px;" class="rounded-circle"></div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $resultado->appends(['nome' => request()->query('nome')])->links() }}



    </div>
    <div class="modal">
        <div class="modal-content">
            <h3>Você tem certeza que <span class="car-name"></span> é um carro?</h3>
            <div class="options">
                <button id="car-option">Sim</button>
                <button id="property-option">Imóvel</button>
                <button id="other-option">Outro</button>
            </div>
        </div>
    </div>
</div>
@foreach($prefeituras as $prefeitura)
  <li>
    <div style="display: flex; flex-wrap: wrap;">
      <div style="flex: 1 1 50%;">
        <div>
          <strong>NOME_A:</strong>
          <span>{{ $prefeitura->NOME_A }}</span>
        </div>
        <div>
          <strong>NASC:</strong>
          <span>{{ date("d/m/Y", strtotime($prefeitura->NASC)) }}</span>
        </div>
        <div>
          <strong>CPF:</strong>
          <span>{{ $prefeitura->CPF }}</span>
        </div>
        <div>
          <strong>LOGR:</strong>
          <span>{{ $prefeitura->LOGR }}</span>
        </div>
        <div>
          <strong>NUM:</strong>
          <span>{{ $prefeitura->NUM }}</span>
        </div>
        <div>
          <strong>COMPL:</strong>
          <span>{{ $prefeitura->COMPL }}</span>
        </div>
        <div>
          <strong>BAIRRO:</strong>
          <span>{{ $prefeitura->BAIRRO }}</span>
        </div>
        <div>
          <strong>CEP:</strong>
          <span>{{ $prefeitura->CEP }}</span>
        </div>
        <div>
          <strong>CIDADE:</strong>
          <span>{{ $prefeitura->CIDADE }}</span>
        </div>
        <div>
          <strong>UF:</strong>
          <span>{{ $prefeitura->UF }}</span>
        </div>
        <div>
          <strong>DDD:</strong>
          <span>{{ $prefeitura->DDD }}</span>
        </div>
        <div>
          <strong>TEL:</strong>
          <span>{!! preg_replace("/($telefone)/i", '<span class="highlight">$1</span>', $prefeitura->TEL) !!}</span>
        </div>
        <div>
          <strong>DDD2:</strong>
          <span>{{ $prefeitura->DDD2 }}</span>
        </div>
        <div>
          <strong>TEL2:</strong>
          <span>{!! preg_replace("/($telefone)/i", '<span class="highlight">$1</span>', $prefeitura->TEL2) !!}</span>
        </div>
        <div>
          <strong>DDDCEL:</strong>
          <span>{{ $prefeitura->DDDCEL }}</span>
        </div>
        <div>
          <strong>CEL:</strong>
          <span>{{ $prefeitura->CEL }}</span>
        </div>
        <div>
          <strong>CELOP:</strong>
          <span>{{ $prefeitura->CELOP }}</span>
        </div>
      </div>
    </div>
  </li>
@endforeach

@foreach($fgts as $fgt)
    <li>
        <div style="display: flex; flex-wrap: wrap;">
            <div style="flex: 1 1 50%;">
                <div>
                    <strong>Nome:</strong>
                    <span>{{ $fgt->nome }}</span>
                </div>
                <div>
                    <strong>CPF:</strong>
                    <span>{{ $fgt->CPF2 }}</span>
                </div>
                <div>
                    <strong>Nascimento:</strong>
                    <span>{{ date('d/m/Y', strtotime($fgt->nasc)) }}</span>
                </div>
                <div>
                    <strong>Endereço:</strong>
                    <span>{{ $fgt->endereco }}</span>
                </div>
                <div>
                    <strong>Bairro:</strong>
                    <span>{{ $fgt->bairro }}</span>
                </div>
                <div>
                    <strong>Cidade:</strong>
                    <span>{{ $fgt->cidade }}</span>
                </div>
                <div>
                    <strong>CEP:</strong>
                    <span>{{ $fgt->cep }}</span>
                </div>
                <div>
                    <strong>Móvel 1:</strong>
                    <span>{!! preg_replace("/($telefone)/i", '<span class="highlight">$1</span>', $fgt->movel1) !!}</span>
                </div>
                <div>
                    <strong>Móvel 2:</strong>
                    <span>{!! preg_replace("/($telefone)/i", '<span class="highlight">$1</span>', $fgt->movel2) !!}</span>
                </div>
                <div>
                    <strong>Móvel 3:</strong>
                    <span>{!! preg_replace("/($telefone)/i", '<span class="highlight">$1</span>', $fgt->movel3) !!}</span>
                </div>
            </div>
            <div>
                <a href="/portaldados/public/user-fgts/{{ $fgt->nome }}">Ver mais</a> 
            </div>
        </div>
    </li>
@endforeach
@foreach($inss as $item)
<li>
    <div style="display: flex; flex-wrap: wrap;">
      <div style="flex: 1 1 50%;">
        <div>
            <strong>Nome Segurado:</strong>
            <span>{{$item->nome_segurado}}</span>
        </div>
        <div>
            <strong>CPF:</strong>
            <span>{{$item->nu_CPF}}</span>
        </div>
        <div>
            <strong>Município:</strong>
            <span>{{ $item->municipio }}</span>
        </div>
        <div>
            <strong>UF:</strong>
            <span>{{ $item->uf }}</span>
        </div>
        <div>
            <strong>Telefone 1:</strong>
            <span>{!! preg_replace("/($telefone)/i", '<span class="highlight">$1</span>', $item->FONE1) !!}</span>
        </div>
        <div>
            <strong>Telefone 2:</strong>
            <span>{!! preg_replace("/($telefone)/i", '<span class="highlight">$1</span>', $item->FONE2) !!}</span>
        </div>
        <div>
            <strong>Telefone 3:</strong>
            <span>{!! preg_replace("/($telefone)/i", '<span class="highlight">$1</span>', $item->FONE3) !!}</span>
        </div>
        <div>
            <strong>Telefone 4:</strong>
            <span>{!! preg_replace("/($telefone)/i", '<span class="highlight">$1</span>', $item->FONE4) !!}</span>
        </div>
    </div>
    
        <div>
            <a href="/portaldados/public/user-inss/{{ $item->nome_segurado }}">Ver mais</a> 
        </div>
    </div>
</li>
@endforeach

{{-- <ul class="pagination">
    @if ($prefeituras->lastPage() > 1)
        <li><a href="{{ $prefeituras->url(1) }}">Primeira</a></li>
        <li><a href="{{ $prefeituras->previousPageUrl() }}">Anterior</a></li>

        @for ($i = max(1, $prefeituras->currentPage() - 5); $i <= min($prefeituras->lastPage(), $prefeituras->currentPage() + 5); $i++)
            <li class="{{ ($prefeituras->currentPage() == $i) ? 'active' : '' }}">
                <a href="{{ $prefeituras->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <li><a href="{{ $prefeituras->nextPageUrl() }}">Próxima</a></li>
        <li><a href="{{ $prefeituras->url($prefeituras->lastPage()) }}">Última</a></li>
    @endif
</ul> --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // obtém o valor do token

    jQuery.noConflict();
    jQuery(document).ready(function($) {
        function confirmCar() {
            var carName = $(this).text();
            var modal = document.querySelector('.modal');
            var carOption = document.querySelector('#car-option');
            var propertyOption = document.querySelector('#property-option');
            var otherOption = document.querySelector('#other-option');
            var selectedOption;

            // exibe a janela modal
            modal.style.display = 'block';

            // exibe o nome do carro na janela modal
            document.querySelector('.car-name').textContent = carName;

            // define os listeners dos botões
            carOption.addEventListener('click', function() {
                selectedOption = 'sim';
                modal.style.display = 'none';
                // atualiza a tabela carro_olx
                console.log(carName + ' é um carro.');
            });
            propertyOption.addEventListener('click', function() {
                selectedOption = 'imovel';
                $.post("{{ route('moverDados') }}", { _token: "{{ csrf_token() }}" })
                    .done(function(data) {
                        alert("Dados movidos com sucesso!");
                    })
                    .fail(function(xhr, status, error) {
                        alert("Erro ao mover dados: " + error);
                    });
            });
            otherOption.addEventListener('click', function() {
                selectedOption = 'outro';
                modal.style.display = 'none';
                // atualiza a tabela outra_categoria_olx
                console.log(carName + ' não é um carro nem um imóvel.');
            });
        }

        $('.car-name').on('click', confirmCar);
    });
</script>
<style>
    .w-5{
        display:none;
    }
    .passar{
        padding: 10px;
        text-align: center;
    }
    .btn-circle {
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin-right: 10px;
    }
    .modal {
        display: none; /* oculta a janela modal por padrão */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }
    .modal-content {
        background-color: #fff;
        padding: 20px;
        max-width: 400px;
        margin: 20px auto;
        border-radius: 5px;
    }
    .options {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }
    .options button {
        padding: 10px;
        border: none;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }
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
    .highlight {
    background-color: yellow;
}
</style>

@endsection