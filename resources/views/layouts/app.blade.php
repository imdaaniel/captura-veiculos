<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Captura de Veículos</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
      <a class="navbar-brand" href="#">Captura de Veículos</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>

          @if (Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="/sair">Sair</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>
          @endif
          
        </ul>

      </div>
    </div>
  </nav>

  <main role="main">
    <div class="container">
      @yield('conteudo')
    </div>
  </main>

  <!-- <footer class="text-muted">
    copyright
  </footer> -->
</body>

</html>