<?php

namespace App\Services;

use App\Models\Artigo;
use Illuminate\Support\Facades\DB;

class CapturadorDeArtigo
{
  private $url = 'https://www.questmultimarcas.com.br/estoque?';

  public function requisicao(string $termo) {
    $ch = curl_init();
    curl_setopt_array($ch, [
      CURLOPT_URL => $this->url . http_build_query(['termo' => $termo]),
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_SSL_VERIFYPEER => false,
    ]);

    $retorno = curl_exec($ch);
    curl_close($ch);

    return $retorno;
  }

  public function capturar(string $termo) {
    $conteudo = $this->requisicao($termo);

    //
  }
}