<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MenuController extends Controller
{
    public function menu()
    {
        $session = session();
        if (!$session->has('logged_in') || !$session->has('rol')) {
            return redirect()->to('/login'); // Asegúrate de redireccionar si el usuario no está logueado
        }

        $data['rol'] = $session->get('rol');
        $data['alias'] = $session->get('alias');

        return view('menu', $data);
    }
}
