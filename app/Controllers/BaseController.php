<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class BaseController extends Controller
{
    protected $helpers = [];

    public function initController($request, $response, $logger)
    {
        // Asegúrate de cargar el constructor padre
        parent::initController($request, $response, $logger);
    }
}
