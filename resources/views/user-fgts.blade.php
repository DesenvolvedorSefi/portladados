@extends('layouts.main')

@section('title','FGTS')

@section('content')
<div>
    <button class="btn btn-primary">Enviar SMS</button>
    <button class="btn btn-secondary" >Enviar Email</button>
    <button class="btn btn-success">Enviar WhatsApp</button>
    <button class="btn btn-danger" >Contato Pessoal</button>
</div>
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
          <span>{{ $fgt->movel1 }}</span>
        </div>
        <div>
          <strong>Móvel 2:</strong>
          <span>{{ $fgt->movel2 }}</span>
        </div>
        <div>
          <strong>Móvel 3:</strong>
          <span>{{ $fgt->movel3 }}</span>
        </div>
      </div>
      <div style="flex: 1 1 50%;">
        <div>
          <strong>ID:</strong>
          <span>{{ $fgt->id }}</span>
        </div>
        <div>
          <strong>CBO:</strong>
          <span>{{ $fgt->cbo }}</span>
        </div>
      
        <div>
          <strong>CNAE:</strong>
          <span>{{ $fgt->cnae }}</span>
        </div>
        <div>
          <strong>CNPJ:</strong>
          <span>{{ $fgt->cnpj }}</span>
        </div>
        <div>
          <strong>Complemento:</strong>
          <span>{{ $fgt->complemento }}</span>
        </div>
        <div>
          <strong>Email 1:</strong>
          <span>{{ $fgt->email1 }}</span>
        </div>
        <div>
          <strong>Fixo 1:</strong>
          <span>{{ $fgt->fixo1 }}</span>
        </div>
        <div>
          <strong>Fixo 2:</strong>
          <span>{{ $fgt->fixo2 }}</span>
        </div>
        <div>
          <strong>Fixo 3:</strong>
          <span>{{ $fgt->fixo3 }}</span>
        </div>
        <div>
          <strong>Saldo:</strong>
          <span>{{ $fgt->saldo }}</
          </div>
          <div>
            <strong>Sexo:</strong>
            <span>{{ $fgt->sexo }}</span>
          </div>
          <div>
            <strong>UF:</strong>
            <span>{{ $fgt->uf }}</span>
          </div>
        </div>
      </div>
    </li>

@endsection