@extends('layouts.main')

@section('title','Prefeituras')

@section('content')
<div>
  <button class="btn btn-primary" onclick="sendSMS('{{ $prefeitura->TEL }}')">Enviar SMS</button>
  <button class="btn btn-secondary" onclick="sendEmail('{{ $prefeitura->EMAIL }}')">Enviar Email</button>
  <button class="btn btn-success" onclick="sendWhatsApp('{{ $prefeitura->CEL }}')">Enviar WhatsApp</button>
  <button class="btn btn-danger" onclick="sendPessoal('{{ $prefeitura->NOME_A }}')">Contato Pessoal</button>
</div>

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
          <span>{{ $prefeitura->TEL }}</span>
        </div>
        <div>
          <strong>DDD2:</strong>
          <span>{{ $prefeitura->DDD2 }}</span>
        </div>
        <div>
          <strong>TEL2:</strong>
          <span>{{ $prefeitura->TEL2 }}</span>
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
        <div>
            <strong>ddd3:</strong>
            <span>{{ $prefeitura->ddd3 }}</span>
          </div>
          <div>
            <strong>telefone3:</strong>
            <span>{{ $prefeitura->telefone3 }}</span>
          </div>
          <div>
            <strong>ddd4:</strong>
            <span>{{ $prefeitura->ddd4 }}</span>
          </div>
          <div>
            <strong>telefone4:</strong>
            <span>{{ $prefeitura->telefone4 }}</span>
          </div>
      </div>
      <div style="flex: 1 1 50%;">
        <div>
          <strong>TIPO:</strong>
          <span>{{ $prefeitura->TIPO }}</span>
        </div>
        <div>
          <strong>TP:</strong>
          <span>{{ $prefeitura->TP }}</span>
        </div>
        <div>
          <strong>EMAIL:</strong>
          <span>{{ $prefeitura->EMAIL }}</span>
        </div>
        <div>
          <strong>CNPJ:</strong>
          <span>{{ $prefeitura->CNPJ }}</span>
        </div>
        <div>
          <strong>SEXO:</strong>
          <span>{{ $prefeitura->SEXO }}</span>
        </div>
        
          <div>
            <strong>ESCO:</strong>
            <span>{{ $prefeitura->ESCO }}</span>
          </div>
          <div>
            <strong>NAC:</strong>
            <span>{{ $prefeitura->NAC }}</span>
          </div>
          <div>
            <strong>CBO:</strong>
            <span>{{ $prefeitura->CBO }}</span>
          </div>
          <div>
            <strong>ADMISSAO:</strong>
            <span>{{ $prefeitura->ADMISSAO }}</span>
          </div>
          <div>
            <strong>DESLIG:</strong>
            <span>{{ $prefeitura->DESLIG }}</span>
          </div>
          <div>
            <strong>SALCONT:</strong>
            <span>{{ $prefeitura->SALCONT }}</span>
          </div>
          <div>
            <strong>CNAE:</strong>
            <span>{{ $prefeitura->CNAE }}</span>
          </div>
          <div>
            <strong>CNAE2:</strong>
            <span>{{ $prefeitura->CNAE2 }}</span>
          </div>
          <div>
            <strong>NJ:</strong>
            <span>{{ $prefeitura->NJ }}</span>
          </div>
          <div>
            <strong>SALDEZ:</strong>
            <span>{{ $prefeitura->SALDEZ }}</span>
          </div>
          <div>
            <strong>VINC:</strong>
            <span>{{ $prefeitura->VINC }}</span>
          </div>
          <div>
            <strong>ID:</strong>
            <span>{{ $prefeitura->ID }}</span>
          </div>
          <div>
            <strong>NOME_B:</strong>
            <span>{{ $prefeitura->NOME_B }}</span>
          </div>
          <div>
            <strong>CONTATOS_ID:</strong>
            <span>{{ $prefeitura->CONTATOS_ID }}</span>
          </div>
          <div>
            <strong>TIPO_TELEFONE:</strong>
            <span>{{ $prefeitura->TIPO_TELEFONE }}</span>
          </div>
        </div>
      </div>
    </li>

@endsection