<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class INSS extends Model
{
    protected $table = 'INSS';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // Defina os campos que são preenchíveis em massa (mass assignable)
    protected $fillable = [
        'nb',
        'nome_segurado',
        'dt_nascimento',
        'IDADE',
        'nu_CPF',
        'esp',
        'dib',
        'ddb',
        'vl_beneficio',
        'id_banco_pagto',
        'id_agencia_banco',
        'id_orgao_pagador',
        'nu_conta_corrente',
        'aps_benef',
        'cs_meio_pagto',
        'id_banco_empres',
        'id_contrato_empres',
        'vl_empres',
        'comp_ini_desconto',
        'comp_fim_desconto',
        'quant_parcelas',
        'vl_parcela',
        'tipo_empres',
        'endereco',
        'bairro',
        'municipio',
        'uf',
        'cep',
        'situacao_empres',
        'dt_averbacao_consig',
        'FONE1',
        'FONE2',
        'FONE3',
        'FONE4',
        'SOMA_PARC',
        'NOVO_BENEFICIO',
        'MARGEM'
    ];
}
