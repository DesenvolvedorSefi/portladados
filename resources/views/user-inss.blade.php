@extends('layouts.main')

@section('title', 'Detalhes do INSS')

@section('content')
    <div>
        <h1>Detalhes do INSS</h1>
        <div>
            <button class="btn btn-primary" onclick="sendSMS('{{ $users->FONE1 }}')">Enviar SMS</button>
            <button class="btn btn-secondary" onclick="sendSMS('{{ $users->FONE2 }}')">Enviar SMS</button>
            <button class="btn btn-success" onclick="sendSMS('{{ $users->FONE3 }}')">Enviar SMS</button>
            <button class="btn btn-danger" onclick="sendSMS('{{ $users->FONE4 }}')">Enviar SMS</button>
        </div>
        <div style="display: flex; flex-wrap: wrap;">
            <div style="flex: 1 1 50%;">
                <div>
                    <strong>NB:</strong>
                    <span>{{ $users->nb }}</span>
                </div>
                <div>
                    <strong>Nome Segurado:</strong>
                    <span>{{ $users->nome_segurado }}</span>
                </div>
                <div>
                    <strong>Data de Nascimento:</strong>
                    <span>{{ date("d/m/Y", strtotime($users->dt_nascimento)) }}</span>
                </div>
                <div>
                    <strong>Idade:</strong>
                    <span>{{ $users->IDADE }}</span>
                </div>
                <div>
                    <strong>CPF:</strong>
                    <span>{{ $users->nu_CPF }}</span>
                </div>
                <div>
                    <strong>Especialidade:</strong>
                    <span>{{ $users->esp }}</span>
                </div>
                <div>
                    <strong>Data de Início do Benefício:</strong>
                    <span>{{ date("d/m/Y", strtotime($users->dib)) }}</span>
                </div>
                <div>
                    <strong>Data de Desligamento do Benefício:</strong>
                    <span>{{ date("d/m/Y", strtotime($users->ddb)) }}</span>
                </div>
                <div>
                    <strong>Valor do Benefício:</strong>
                    <span>{{ $users->vl_beneficio }}</span>
                </div>
                <div>
                    <strong>ID do Banco de Pagamento:</strong>
                    <span>{{ $users->id_banco_pagto }}</span>
                </div>
                <div>
                    <strong>ID da Agência Bancária:</strong>
                    <span>{{ $users->id_agencia_banco }}</span>
                </div>
                <div>
                    <strong>ID do Orgão Pagador:</strong>
                    <span>{{ $users->id_orgao_pagador }}</span>
                </div>
                <div>
                    <strong>Número da Conta Corrente:</strong>
                    <span>{{ $users->nu_conta_corrente }}</span>
                </div>
                <div>
                    <strong>APS do Benefício:</strong>
                    <span>{{ $users->aps_benef }}</span>
                </div>
                <div>
                    <strong>Meio de Pagamento:</strong>
                    <span>{{ $users->cs_meio_pagto }}</span>
                </div>
            </div>
            <div style="flex: 1 1 50%;">
                <div>
                    <strong>ID do Banco Empresarial:</strong>
                    <span>{{ $users->id_banco_empres }}</span>
                </div>
                <div>
                    <strong>ID do Contrato Empresarial:</strong>
                    <span>{{ $users->id_contrato_empres }}</span>
                </div>
                <div>
                    <strong>Valor Empresarial:</strong>
                    <span>{{ $users->vl_empres }}</span>
                </div>
                <div>
                    <strong>Data de Início do Desconto:</strong>
                    <span>{{ date("d/m/Y", strtotime($users->comp_ini_desconto)) }}</span>
                </div>
                <div>
                    <strong>Data de Fim do Desconto:</strong>
                    <span>{{ date("d/m/Y", strtotime($users->comp_fim_desconto)) }}</span>
                </div>
                <div>
                    <strong>Quantidade de Parcelas:</strong>
                    <span>{{ $users->quant_parcelas }}</span>
                </div>
                <div>
                    <strong>Valor da Parcela:</strong>
                    <span>{{ $users->vl_parcela }}</span>
                </div>
                <div>
                    <strong>Tipo Empresarial:</strong>
                    <span>{{ $users->tipo_empres }}</span>
                </div>
                <div>
                    <strong>Endereço:</strong>
                    <span>{{ $users->endereco }}</span>
                </div>
                <div>
                    <strong>Bairro:</strong>
                    <span>{{ $users->bairro }}</span>
                </div>
                <div>
                    <strong>Município:</strong>
                    <span>{{ $users->municipio }}</span>
                </div>
                <div>
                    <strong>UF:</strong>
                    <span>{{ $users->uf }}</span>
                </div>
                <div>
                    <strong>CEP:</strong>
                    <span>{{ $users->cep }}</span>
                </div>
                <div>
                    <strong>Situação Empresarial:</strong>
                    <span>{{ $users->situacao_empres }}</span>
                </div>
                <div>
                    <strong>Data de Averbação Consignatória:</strong>
                    <span>{{ date("d/m/Y", strtotime($users->dt_averbacao_consig)) }}</span>
                </div>
                <div>
                    <strong>Telefone 1:</strong>
                    <span>{{ $users->FONE1 }}</span>
                </div>
                <div>
                    <strong>Telefone 2:</strong>
                    <span>{{ $users->FONE2 }}</span>
                </div>
                <div>
                    <strong>Telefone 3:</strong>
                    <span>{{ $users->FONE3 }}</span>
                </div>
                <div>
                    <strong>Telefone 4:</strong>
                    <span>{{ $users->FONE4 }}</span>
                </div>
                <div>
                    <strong>Soma das Parcelas:</strong>
                    <span>{{ $users->SOMA_PARC }}</span>
                </div>
                <div>
                    <strong>Novo Benefício:</strong>
                    <span>{{ $users->NOVO_BENEFICIO }}</span>
                </div>
                <div>
                    <strong>Margem:</strong>
                    <span>{{ $users->MARGEM }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection

