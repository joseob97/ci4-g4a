<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use App\Filters\AuthFilter;

class Filters extends BaseConfig
{
    // Aliases for filters to make reading things nicer and simpler.
    public $aliases = [
        'csrf'     => \CodeIgniter\Filters\CSRF::class,
        'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
        'honeypot' => \CodeIgniter\Filters\Honeypot::class,
        'auth'     => AuthFilter::class, // Registrar el filtro de autenticación aquí
    ];

    // Always applied before every request
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
        ],
    ];

    // Works on a particular HTTP method (GET, POST, etc.)
    public $methods = [];

    // List of filter aliases that should run on any before or after URI patterns.
    // Aquí configurarías qué rutas necesitan autenticación.
    public $filters = [
        'auth' => [
            'before' => [
                'menu',      // Asegura que solo usuarios autenticados puedan acceder al menú
                'menu/*',    // Asegura todas las subrutas bajo 'menu'
                // Agregar más rutas o grupos de rutas según sea necesario
            ],
        ],
    ];
}
