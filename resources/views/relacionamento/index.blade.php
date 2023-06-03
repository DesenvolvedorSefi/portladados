@extends('layouts.main')

@section('title','Relacionamentos')


@section('content')
<div class="container mt-4">
    <h1>Relacionamentos</h1>

    <table class="table table-striped table-hover mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Facebook</th>
                <th>WhatsApp</th>
                <th>SMS</th>
                <th>Email</th>
                <th>Pessoal</th>
                <th>Data da Tentativa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($relationships as $relationship)
                <tr>
                    <td>{{ $relationship->id }}</td>
                    <td>{{ $relationship->cliente }}</td>
                    <td>{{ $relationship->facebook ? 'Sim' : 'Não' }}</td>
                    <td>{{ $relationship->whatsapp ? 'Sim' : 'Não' }}</td>
                    <td>{{ $relationship->sms ? 'Sim' : 'Não' }}</td>
                    <td>{{ $relationship->email ? 'Sim' : 'Não' }}</td>
                    <td>{{ $relationship->pessoal ? 'Sim' : 'Não' }}</td>
                    <td>{{ $relationship->data_tentativa ? date('d/m/Y', strtotime($relationship->data_tentativa)) : '' }}</td>

                    <td>
                        <a class="btn btn-primary" href="{{ route('relacionamento.edit', $relationship->id) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $relationships->links() }} <!-- adiciona os links de navegação da paginação -->

</div>
<style>
    .w-5{
        display:none;
    }
    .passar{
        padding: 10px;
        text-align: center;
    }
</style>
@endsection

