@extends('layouts.main')

@section('title','Principal')

@section('content')
<div class="container">
  <div class="mw-100 container">
    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-6 container">
        <h2>Pesquise um conjunto de dados</h2>
        <div class="row">
          <input id="tags" type="text" class="form-control col" placeholder="Nome/CPF/Número" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <button onClick="buscar()" id="pesquisar" type="button" class="btn btn-primary">
            Pesquisar
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById("tags").addEventListener("keyup", function(event) {
      if (event.key === "Enter") {
          buscar();
      }
  });
  
  function buscar() {
      var searchTerm = document.getElementById("tags").value;
      window.location.href = '/portaldados/public/search/' + encodeURIComponent(searchTerm);
}

  </script>

@endsection
