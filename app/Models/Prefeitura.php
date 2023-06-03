<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefeitura extends Model
{
    protected $table = 'prefeituras'; // nome da tabela no banco de dados
    protected $primaryKey = 'CPF'; // chave primária da tabela

    protected $fillable = [
        'CPF',
        'DDD',
        'TEL',
        'DDD2',
        'TEL2',
        'DDDCEL',
        'CEL',
        'CELOP',
        'NOME_A',
        'TIPO',
        'LOGR',
        'NUM',
        'COMPL',
        'BAIRRO',
        'CEP',
        'CIDADE',
        'UF',
        'TP',
        'EMAIL',
        'CNPJ',
        'SEXO',
        'NASC',
        'ESCO',
        'NAC',
        'CBO',
        'ADMISSAO',
        'DESLIG',
        'SALCONT',
        'CNAE',
        'CNAE2',
        'NJ',
        'SALDEZ',
        'VINC',
        'ID',
        'NOME_B',
        'CONTATOS_ID',
        'ddd3',
        'telefone3',
        'ddd4',
        'telefone4',
        'TIPO_TELEFONE',
        'rn',
    ];
}