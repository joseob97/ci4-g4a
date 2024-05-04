<?php namespace App\Models;

use Myth\Auth\Models\UserModel as MythUserModel;

class MyUserModel extends MythUserModel
{
    protected $table = 'usuario'; // Asegúrate de que es el nombre correcto de tu tabla
    protected $primaryKey = 'id_usuario'; // El nombre de la columna que actúa como clave primaria

    // Asegúrate de que las entidades y los campos permitidos reflejen tus columnas personalizadas
    protected $returnType = 'array'; // Si tienes una entidad personalizada
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'alias', 'password', 'correo', 'nombre', 'pais', 'ciudad', 'direccion', 'cod_postal'
    ];

    // Reglas de validación específicas que coinciden con tu esquema de base de datos
    protected $validationRules = [
        'alias'   => 'required|alpha_numeric_space|min_length[3]|is_unique[usuario.alias,id_usuario,{id_usuario}]',
        'correo'  => 'required|valid_email|is_unique[usuario.correo,id_usuario,{id_usuario}]',
        'password' => 'required|strong_password',
        'nombre'   => 'required'
    ];

    public function findUserByCredentials($credentials)
    {
        // Modifica este método para buscar por correo o alias según tu estructura
        if (!empty($credentials['correo'])) {
            return $this->where('correo', $credentials['correo'])->first();
        } elseif (!empty($credentials['alias'])) {
            return $this->where('alias', $credentials['alias'])->first();
        }
        return null;
    }
}
