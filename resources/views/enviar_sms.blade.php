@extends('layouts.main')

@section('title', 'Enviar SMS')

@section('content')
    <div class="container">
        <h1>Enviar SMS</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('sms.enviar') }}" method="POST">
            @csrf

            @if (isset($formattedNumbers) && count($formattedNumbers) > 0)
                <div class="form-group">
                    <label for="selected_number">Selecione o número de telefone:</label>
                    <select class="form-control" name="msisdn" required>
                        @foreach ($formattedNumbers as $number)
                            <option value="{{ $number }}">{{ $number }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="form-group">
                <label for="sms_text">Mensagem:</label>
                <textarea class="form-control" name="sms_text" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
@endsection
