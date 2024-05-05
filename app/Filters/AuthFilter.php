<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Comprobar si el usuario está logueado
        if (! session()->get('isLoggedIn')) {
            // No está logueado, redirigir al login
            return redirect()->to('login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Aquí puedes añadir código que se ejecuta después de procesar la solicitud
    }
}
