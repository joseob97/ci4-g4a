<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DatabaseTest extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM usuario'); // Asegúrate de que la tabla se llama 'usuarios'
        $results = $query->getResult();

        foreach ($results as $row) {
            echo $row->alias . "<br>";
            echo $row->correo . "<br>";
        }
    }
}
