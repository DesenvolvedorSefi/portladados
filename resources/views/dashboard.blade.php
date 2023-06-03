@extends('layouts.main')

@section('title','Carros')




@section('content')
<body class="h-100">
<div class="jumbotron">
    <h1 class="display-1">{{ $quantidadeLinksOnline }}</h1>
    <p class="lead">carros vendidos agora e todos são nossos clientes</p>
    <hr class="my-4">
    <p>Veja a lista completa de carros vendidos <a href="/portaldados/public/todoscarros">aqui</a>.</p>
  </div>

<h1>Carros cadastrados</h1>

<canvas id="carros"></canvas>
<div class="d-flex justify-content-center mt-3">
    <button class="btn btn-primary mx-2" id="diaButton"></button>
    <button class="btn btn-primary mx-2" id="semanaButton"></button>
    <button class="btn btn-primary mx-2" id="mesButton"></button>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var carros = new Chart(document.getElementById('carros'), {
        type: 'line',
        data: {
            labels: [
                @foreach ($carros_por_dia as $carro)
                    "{{ $carro->Dia }}",
                @endforeach
            ],
            datasets: [{
                label: 'Total de carros por dia',
                data: [
                    @foreach ($carros_por_dia as $carro)
                        {{ $carro->total }},
                    @endforeach
                ],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1,
                hidden: false
            },
            {
                label: 'Total de carros por semana',
                data: [
                    @foreach ($carros_por_semana as $carro)
                        {{ $carro->total }},
                    @endforeach
                ],
                fill: false,
                borderColor: 'rgb(255, 99, 132)',
                tension: 0.1,
                hidden: true
            },
            {
                label: 'Total de carros por mês',
                data: [
                    @foreach ($carros_por_mes as $carro)
                        {{ $carro->total }},
                    @endforeach
                ],
                fill: false,
                borderColor: 'rgb(54, 162, 235)',
                tension: 0.1,
                hidden: true
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    function showDia() {
        carros.data.datasets[0].hidden = false;
        carros.data.datasets[1].hidden = true;
        carros.data.datasets[2].hidden = true;
        carros.update();
    }

    function showSemana() {
        carros.data.datasets[0].hidden = true;
        carros.data.datasets[1].hidden = false;
        carros.data.datasets[2].hidden = true;
        carros.update();
    }

    function showMes() {
        carros.data.datasets[0].hidden = true;
        carros.data.datasets[1].hidden = true;
        carros.data.datasets[2].hidden = false;
        carros.update();
    }

        var diaButton = document.createElement('button');
        diaButton.innerHTML = 'Dia';
        diaButton.classList.add('btn', 'btn-primary', 'mx-2');
        diaButton.addEventListener('click', showDia);
        document.getElementById('diaButton').appendChild(diaButton);

        var semanaButton = document.createElement('button');
        semanaButton.innerHTML = 'Semana';
        semanaButton.classList.add('btn', 'btn-primary', 'mx-2');
        semanaButton.addEventListener('click', showSemana);
        document.getElementById('semanaButton').appendChild(semanaButton);

        var mesButton = document.createElement('button');
        mesButton.innerHTML = 'Mês';
        mesButton.classList.add('btn', 'btn-primary', 'mx-2');
        mesButton.addEventListener('click', showMes);
        document.getElementById('mesButton').appendChild(mesButton);
</script>
@endsection