@extends('layouts.main')

@section('content')
<div class="container">
  <div class="row justify-content-center justify-content-between">
    <div class="col-md-15">
      <div class="card">
        <div class="card-header">{{ __('Resultados da Pesquisa') }}</div>
        <div class="card-body">
          <h2>Carros</h2>
          <ul>
            @foreach($carros->take(1) as $carro)
              <li>
                <div style="display: flex; flex-wrap: wrap;">
                  <div style="flex: 1 1 50%;">
                    <div>
                      <strong>Vendedor:</strong> {!! preg_replace("/(" . preg_quote($searchQuery, '/') . ")/i", '<span class="highlight">$1</span>', $carro->Vendedor) !!}
                    </div>
                    <div>
                      <strong>Cidade:</strong> {{ $carro->Cidade }}
                    </div>
                    <div>
                      <strong>Telefone:</strong> {!! preg_replace("/(" . preg_quote($searchQuery, '/') . ")/i", '<span class="highlight">$1</span>', $carro->Telefone) !!}
                    </div>
                    <div>
                      <strong>Telefone Descrição:</strong> {!! preg_replace("/(" . preg_quote($searchQuery, '/') . ")/i", '<span class="highlight">$1</span>', $carro->Telefone_Descricao) !!}
                    </div>
                  </div>
                  <div>
                    <a href="/portaldados/public/mostradados?nome={{ $carro->Vendedor }}">Ver mais</a>
                  </div>
                </div>
              </li>
            @endforeach

          </ul>

          

          <h2>FGTS</h2>
          <ul>
            @foreach($fgts as $fgt)
            <li>
                <div style="display: flex; flex-wrap: wrap;">
                    <div style="flex: 1 1 50%;">
                      <div>
                        <strong>Nome:</strong>
                        <span>{!! preg_replace("/($searchQuery)/i", '<span class="highlight">$1</span>', $fgt->nome) !!}</span>
                    </div>
                    <div>
                        <strong>CPF:</strong>
                        <span>{!! preg_replace("/($searchQuery)/i", '<span class="highlight">$1</span>', $fgt->CPF2) !!}</span>
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
                        <span>{!! preg_replace("/($searchQuery)/i", '<span class="highlight">$1</span>', $fgt->movel1) !!}</span>
                    </div>
                    <div>
                        <strong>Móvel 2:</strong>
                        <span>{!! preg_replace("/($searchQuery)/i", '<span class="highlight">$1</span>', $fgt->movel2) !!}</span>
                    </div>
                    <div>
                        <strong>Móvel 3:</strong>
                        <span>{!! preg_replace("/($searchQuery)/i", '<span class="highlight">$1</span>', $fgt->movel3) !!}</span>
                    </div>
                    
                    </div>
                    <div>
                        <a href="/portaldados/public/user-fgts/{{ $fgt->nome }}">Ver mais</a> 
                    </div>
                </div>
            </li>
        @endforeach
        
            </ul>
            <ul class="pagination">
              @if ($fgts->lastPage() > 10)
                  <li><a href="{{ $fgts->url(1) }}">Primeira</a></li>
                  <li><a href="{{ $fgts->previousPageUrl() }}">Anterior</a></li>
          
                  @for ($i = max(1, $fgts->currentPage() - 5); $i <= min($fgts->lastPage(), $fgts->currentPage() + 5); $i++)
                      <li class="{{ ($fgts->currentPage() == $i) ? 'active' : '' }}">
                          <a href="{{ $fgts->url($i) }}">{{ $i }}</a>
                      </li>
                  @endfor
          
                  <li><a href="{{ $fgts->nextPageUrl() }}">Próxima</a></li>
                  <li><a href="{{ $fgts->url($fgts->lastPage()) }}">Última</a></li>
              @endif
          </ul>
    <h2>INSS</h2>
    <ul>
          @foreach($inss as $item)
          <li>
              <div style="display: flex; flex-wrap: wrap;">
                <div style="flex: 1 1 50%;">
                  <div>
                      <strong>Nome Segurado:</strong>
                      <span>{!! preg_replace("/($searchQuery)/i", '<span class="highlight">$1</span>', strtoupper($item->nome_segurado)) !!}</span>
                  </div>
                  <div>
                      <strong>CPF:</strong>
                      <span>{!! preg_replace("/($searchQuery)/i", '<span class="highlight">$1</span>', $item->nu_CPF) !!}</span>
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
                      <span>{!! preg_replace("/($searchQuery)/i", '<span class="highlight">$1</span>', $item->FONE1) !!}</span>
                  </div>
                  <div>
                      <strong>Telefone 2:</strong>
                      <span>{!! preg_replace("/($searchQuery)/i", '<span class="highlight">$1</span>', $item->FONE2) !!}</span>
                  </div>
                  <div>
                      <strong>Telefone 3:</strong>
                      <span>{!! preg_replace("/($searchQuery)/i", '<span class="highlight">$1</span>', $item->FONE3) !!}</span>
                  </div>
                  <div>
                      <strong>Telefone 4:</strong>
                      <span>{!! preg_replace("/($searchQuery)/i", '<span class="highlight">$1</span>', $item->FONE4) !!}</span>
                  </div>
              </div>
              
                  <div>
                      <a href="/portaldados/public/user-inss/{{ $item->nome_segurado }}">Ver mais</a> 
                  </div>
              </div>
          </li>
      @endforeach
    </ul>
    <ul class="pagination">
      @if ($inss->lastPage() > 10)
          <li><a href="{{ $inss->url(1) }}">Primeira</a></li>
          <li><a href="{{ $inss->previousPageUrl() }}">Anterior</a></li>
  
          @for ($i = max(1, $inss->currentPage() - 5); $i <= min($inss->lastPage(), $inss->currentPage() + 5); $i++)
              <li class="{{ ($inss->currentPage() == $i) ? 'active' : '' }}">
                  <a href="{{ $inss->url($i) }}">{{ $i }}</a>
              </li>
          @endfor
  
          <li><a href="{{ $inss->nextPageUrl() }}">Próxima</a></li>
          <li><a href="{{ $inss->url($inss->lastPage()) }}">Última</a></li>
      @endif
  </ul>
  

 
          <h2>Prefeituras</h2>
          @foreach($prefeituras as $prefeitura)
          <li>
            <div style="display: flex; flex-wrap: wrap;">
              <div style="flex: 1 1 50%;">
                <div>
                  <strong>NOME_A:</strong>
                  <span>{!! preg_replace("/($searchQuery)/i", '<span class="highlight">$1</span>', $prefeitura->NOME_A) !!}</span>
                </div>
                <div>
                  <strong>NASC:</strong>
                  <span>{{ date("d/m/Y", strtotime($prefeitura->NASC)) }}</span>
                </div>
                <div>
                  <strong>CPF:</strong>
                  <span>{!! preg_replace("/($searchQuery)/i", '<span class="highlight">$1</span>', $prefeitura->CPF) !!}</span>
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
                  <span>{!! preg_replace("/($searchQuery)/i", '<span class="highlight">$1</span>', $prefeitura->TEL) !!}</span>
                </div>
                <div>
                  <strong>DDD2:</strong>
                  <span>{{ $prefeitura->DDD2 }}</span>
                </div>
                <div>
                  <strong>TEL2:</strong>
                  <span>{!! preg_replace("/($searchQuery)/i", '<span class="highlight">$1</span>', $prefeitura->TEL2) !!}</span>
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
              <div>
                <a href="/portaldados/public/user-prefeitura/{{ $prefeitura->NOME_A }}">Ver mais</a>
              </div>
            </div>
          </li>
        @endforeach
        
          <ul class="pagination">
            @if ($prefeituras->lastPage() > 10)
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
        </ul>
          
        
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>

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
  .highlight {
    background-color: yellow;
}
</style>

@endsection
