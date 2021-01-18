<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class CustomEloquentUserProvider extends EloquentUserProvider
{
    public function validateCredentials(UserContract $usuario, array $credenciais) {
        $senha = $credenciais['password'];
        return parent::validateCredentials($usuario, $credenciais);
        // return $this->hasher->check($senha, $usuario->getAuthPassword());
    }

    // public function retrieveByCredentials(array $credenciais) {
    //     if (isset($credenciais['senha'])) {
    //         unset($credenciais['senha']);
    //     }

    //     return parent::retrieveByCredentials($credenciais);
    // }
}
