@extends('layouts.app')

@section('conteudo')

@if ($errors->has('msg'))
  <div class="alert alert-danger">
    {{ $errors->first('msg') }}
  </div>
@endif

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
    <th></th>
  </thead>
  <tbody>
  @foreach ($artigos as $artigo)
    <tr>
      <td>{{ $artigo->nome_veiculo }}</td>
      <td>{{ $artigo->ano }}</td>
      <td>{{ $artigo->combustivel }}</td>
      <td>{{ $artigo->portas }}</td>
      <td>{{ $artigo->quilometragem }}</td>
      <td>{{ $artigo->cambio }}</td>
      <td>{{ $artigo->cor }}</td>
      <td>
        <a href="{{ $artigo->link }}" target="_blank" class="btn btn-primary">Link</a>
      </td>
      <td>
        <form action="/artigos/{{ $artigo->id }}" idArtigo="{{ $artigo->id }}" method="POST">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          <button type="button" idArtigo="{{ $artigo->id }}" class="btn btn-danger btnExcluir">Excluir</button>
        </form>
      </td>
    </tr>
  @endforeach
  
  @if (count($artigos) == 0)
    <tr>
      <td colspan="7">Sem registros</td>
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