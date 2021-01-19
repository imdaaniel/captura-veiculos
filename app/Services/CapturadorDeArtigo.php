<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
class CapturadorDeArtigo
{
  private $url = 'https://www.questmultimarcas.com.br/estoque?';

  private function retornaConteudo(string $termo) {
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

  public function capturaArtigos(string $termo) {
    $artigos = [];
    $campos = [
      'id_usuario',
      'link',
      'nome_veiculo',
      'ano',
      'quilometragem',
      'combustivel',
      'cambio',
      'portas',
      'cor',
    ];
    $id_usuario = Auth::user()->id;

    $conteudo = $this->retornaConteudo($termo);

    preg_match_all('/<article class="card clearfix" id="[0-9]+">(.*?)<\/article>/s', $conteudo, $matches);
    
    if (empty($matches[0])) {
      return [];
    }

    foreach ($matches[0] as $artigo) {
      preg_match_all('/<h2 class="card__title ui-title-inner"><a href="(\S+)">(.*?)<\/a><\/h2>|<span class="card-list__info">(.*?)<\/span>/s', $artigo, $dados_veiculo);

      // Tratamento dos valores
      $link = trim($dados_veiculo[1][0]);
      $cor = trim($dados_veiculo[3][6]);
      $combustivel = trim($dados_veiculo[3][3]);
      $cambio = trim($dados_veiculo[3][4]);

      $nome_veiculo = trim($dados_veiculo[2][0]);
      $nome_veiculo = addslashes($nome_veiculo);
      
      $ano = trim($dados_veiculo[3][1]);
      $ano = (int) $ano;

      $quilometragem = trim($dados_veiculo[3][2]);
      $quilometragem = str_replace('.', '', $quilometragem);
      $quilometragem = (int) $quilometragem;

      $portas = trim($dados_veiculo[3][5])[0];
      $portas = (int) $portas;

      $artigos[] = [
        'id_usuario' => $id_usuario,
        'link' => $link,
        'nome_veiculo' => $nome_veiculo,
        'ano' => $ano,
        'quilometragem' => $quilometragem,
        'combustivel' => $combustivel,
        'cambio' => $cambio,
        'portas' => $portas,
        'cor' => $cor,
      ];
    }

    return $artigos;
  }
}