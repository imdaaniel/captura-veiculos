@extends('layouts.app')

@section('conteudo')
<form method="POST" action="/artigos/capturar">
  <div class="form-group">
    <input type="text" class="form-control" name="" id="">
    <button type="button" class="btn btn-primary">Capturar</button>
  </div>
</form>
@endsection