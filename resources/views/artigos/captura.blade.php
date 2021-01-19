@extends('layouts.app')

@section('conteudo')

@if ($errors->any())
<div class="alert alert-warning">
  {{ $errors->first() }}
</div>
@endif

@isset($msg)
<div class="alert alert-success">
  {{ $msg }}
</div>
@endisset

<form method="POST" action="/artigos/capturar">
  {{ method_field('POST') }}
  {{ csrf_field() }}

  <div class="form-group">
    <label for="termo">Digite um termo para capturar</label>
    <input type="text" class="form-control" name="termo" id="termo" 
      placeholder="Audi"
      required
      autofocus
    >
  </div>

  <div class="form-group align-right">
    <button type="submit" class="btn btn-primary">Capturar</button>
  </div>
</form>
@endsection