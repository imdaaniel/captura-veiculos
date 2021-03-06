@extends('layouts.app')

@section('conteudo')

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

@if (Session::has('msg'))
<div class="alert alert-success">
  {{ Session::get('msg') }}
</div>
@endif

<form action="/artigos/buscar" method="POST" class="form-inline mb-2">
  {{ method_field('POST') }}
  {{ csrf_field() }}

  <div class="form-group">
    <input type="text" name="nome_veiculo" class="form-control" placeholder="Audi A3" required>
    <button type="submit" class="btn btn-primary ml-2"><i class="fa fa-search"></i> Buscar</button>
    
    @isset($busca)
    <a href="/artigos" class="btn btn-success ml-2"><i class="fa fa-undo"></i> Limpar</a>
    @endisset
  </div>
</form>

<table class="table table-striped">
  <thead>
    <th>Nome</th>
    <th>Ano</th>
    <th>Combustível</th>
    <th>Portas</th>
    <th>Quilometragem</th>
    <th>Câmbio</th>
    <th>Cor</th>
    <th></th>
  </thead>
  <tbody>
  @foreach ($artigos as $artigo)
    <tr>
      <td>{{ $artigo->nome_veiculo }}</td>
      <td>{{ $artigo->ano }}</td>
      <td>{{ $artigo->combustivel }}</td>
      <td>{{ $artigo->portas }}</td>
      <td>{{ number_format($artigo->quilometragem, 0, '', '.') }}</td>
      <td>{{ $artigo->cambio }}</td>
      <td>{{ $artigo->cor }}</td>
      <td>
        <div class="row">
          <a href="{{ $artigo->link }}" target="_blank" class="btn btn-primary"
            title="Detalhes do artigo"
          >
            <i class="fa fa-link"></i>
          </a>

          <form action="/artigos/{{ $artigo->id }}" idArtigo="{{ $artigo->id }}" method="POST">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="button" idArtigo="{{ $artigo->id }}" 
              class="btn btn-danger btnExcluir"
              title="Excluir artigo"
            >
              <i class="fa fa-trash"></i>
            </button>
          </form>

        </div>
      </td>
    </tr>
  @endforeach

  @if (count($artigos) == 0)
    <tr>
      <td colspan="8">Sem registros</td>
    </tr>
  @endif
  </tbody>
</table>

<script>
  document.querySelectorAll('.btnExcluir').forEach(btn => {
    btn.addEventListener('click', e => {
    if (confirm('Tem certeza que deseja excluir esse artigo?')) {
      let id = btn.getAttribute('idArtigo');
      document.querySelector(`form[idArtigo="${id}"]`).submit();
    }
  })
  });
</script>
@endsection