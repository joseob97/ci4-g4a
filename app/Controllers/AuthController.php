<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function attemptLogin()
{
    $session = session();
    $model = new UserModel();
    $alias = $this->request->getPost('alias');
    $password = $this->request->getPost('password');

    $user = $model->verifyUser($alias, $password);

    if ($user) {
        $sessionData = [
            'alias' => $user['alias'],
            'rol' => $user['rol'],  // Asegúrate de incluir el rol del usuario aquí
            'isLoggedIn' => true,
        ];
        $session->set($sessionData);
        return redirect()->to('menu');
    } else {
        $session->setFlashdata('error', 'Credenciales incorrectas');
        return redirect()->to('login');
    }
}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
