@extends('layouts.main')

@section('title','Principal')


@section('content')

    <h1>Editar Relacionamento</h1>

    <form class="form-horizontal" method="POST" action="{{ route('relacionamento.update', $relationship->id) }}">
        @csrf
        @method('PUT')
    
        <div class="form-group">
            <label for="cliente" class="col-sm-2 control-label">Cliente:</label>
            <div class="col-sm-10">
                <input type="text" id="cliente" name="cliente" class="form-control" value="{{ $relationship->cliente }}" required>
            </div>
        </div>
    
        <div class="form-group">
            <label for="facebook" class="col-sm-2 control-label">Facebook:</label>
            <div class="col-sm-10">
                <input type="checkbox" id="facebook" name="facebook" value="1" {{ $relationship->facebook ? 'checked' : '' }}>
            </div>
        </div>
    
        <div class="form-group">
            <label for="whatsapp" class="col-sm-2 control-label">WhatsApp:</label>
            <div class="col-sm-10">
                <input type="checkbox" id="whatsapp" name="whatsapp" value="1" {{ $relationship->whatsapp ? 'checked' : '' }}>
            </div>
        </div>
    
        <div class="form-group">
            <label for="sms" class="col-sm-2 control-label">SMS:</label>
            <div class="col-sm-10">
                <input type="checkbox" id="sms" name="sms" value="1" {{ $relationship->sms ? 'checked' : '' }}>
            </div>
        </div>
    
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email:</label>
            <div class="col-sm-10">
                <input type="checkbox" id="email" name="email" value="1" {{ $relationship->email ? 'checked' : '' }}>
            </div>
        </div>
    
        <div class="form-group">
            <label for="pessoal" class="col-sm-2 control-label">Pessoal:</label>
            <div class="col-sm-10">
                <input type="checkbox" id="pessoal" name="pessoal" value="1" {{ $relationship->pessoal ? 'checked' : '' }}>
            </div>
        </div>
    
        <div class="form-group">
            <label for="data_tentativa" class="col-sm-2 control-label">Data da Tentativa:</label>
            <div class="col-sm-10">
                <input type="datetime-local" id="data_tentativa" name="data_tentativa" class="form-control" value="{{ $relationship->data_tentativa ? $relationship->data_tentativa->format('Y-m-d\TH:i:s') : '' }}" required>
            </div>
        </div>
    
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </form>
    <script>
        var availableTags = <?php echo $clientes_json ?>;
        $("#cliente").on("input", function() {
        var availableTags = <?php echo $clientes_json ?>;
        $(this).autocomplete({
            // Limita a quantidade de resultados exibidos
            maxResults: 10,
            source: function(request, response) {
            // Filtra os resultados baseados no termo de busca
            var results = $.ui.autocomplete.filter(availableTags, request.term);
            response(results.slice(0, this.options.maxResults));
            }
        });
        });
      </script>



@endsection

