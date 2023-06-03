@extends('layouts.main')

@section('title','Principal')


@section('content')
<div class="container">
    <h1>Editar Relacionamento</h1>

    <form method="POST" action="{{ route('relacionamento.update', $relacionamento->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="cliente">Cliente:</label>
            <input type="text" class="form-control" id="cliente" name="cliente" value="{{ $relacionamento->cliente }}" required>
        </div>

        <div class="form-group">
            <label for="facebook">Facebook:</label>
            <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $relacionamento->facebook }}">
        </div>

        <div class="form-group">
            <label for="whatsapp">WhatsApp:</label>
            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ $relacionamento->whatsapp }}">
        </div>

        <div class="form-group">
            <label for="sms">SMS:</label>
            <input type="text" class="form-control" id="sms" name="sms" value="{{ $relacionamento->sms }}">
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $relacionamento->email }}">
        </div>

        <div class="form-group">
            <label for="pessoal">Pessoal:</label>
            <input type="text" class="form-control" id="pessoal" name="pessoal" value="{{ $relacionamento->pessoal }}">
        </div>

        <div class="form-group">
            <label for="tentativa_facebook">Tentativa Facebook:</label>
            <select class="form-control" id="tentativa_facebook" name="tentativa_facebook">
                <option value="">Selecione</option>
                <option value="1" {{ $relacionamento->tentativa_facebook == 1 ? 'selected' : '' }}>Sim</option>
                <option value="0" {{ $relacionamento->tentativa_facebook == 0 ? 'selected' : '' }}>Não</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tentativa_whatsapp">Tentativa WhatsApp:</label>
            <select class="form-control" id="tentativa_whatsapp" name="tentativa_whatsapp">
                <option value="">Selecione</option>
                <option value="1" {{ $relacionamento->tentativa_whatsapp == 1 ? 'selected' : '' }}>Sim</option>
                <option value="0" {{ $relacionamento->tentativa_whatsapp == 0 ? 'selected' : '' }}>Não</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tentativa_sms">Tentativa SMS:</label>
            <select class="form-control" id="tentativa_sms" name="tentativa_sms">
                <option value="">Selecione</option>
                <option value="1" {{ $relacionamento->tentativa_sms == 1 ? 'selected' : '' }}>Sim</option>
                <option value="0" {{ $relacionamento->tentativa_sms == 0 ? 'selected' : '' }}>Não</option>
            </select>
        </div>
    </form>
</div>
    
@endsection

