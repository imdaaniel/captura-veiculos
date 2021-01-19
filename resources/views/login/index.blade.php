@extends('layouts.app')

@section('conteudo')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="POST" action="/autenticar">
          @csrf
          
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <div class="form-group row">
            <label for="usuario" class="col-md-4 col-form-label text-md-right">Usuário</label>
            <div class="col-md-6">
              <input type="text" id="usuario" name="usuario" class="form-control" required autofocus>
            </div>
          </div>

          <div class="form-group row">
            <label for="senha" class="col-md-4 col-form-label text-md-right">Senha</label>
            <div class="col-md-6">
              <input type="password" id="senha" class="form-control" name="senha" required>
            </div>
          </div>

          <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
              Entrar
            </button>
          </div>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection