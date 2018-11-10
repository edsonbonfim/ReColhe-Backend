<?php

namespace App\Controller;

use App\Model\User;

class AuthController
{
    public function login(\Request $request)
    {
        $user = User::find_by_email_and_senha($request->email, md5($request->senha));

        if (!is_null($user)) {
            http_response_code(200);
        } else {
            http_response_code(203);
        }
        assign('json', json_encode($user));
        render('recolhe');
    }

    public function cadastro(\Request $request)
    {
        $user = new User();
        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->senha = md5($request->senha);
        $user->endereco = $request->endereco;
        $user->status = 1;
        $user->save();
    }
}