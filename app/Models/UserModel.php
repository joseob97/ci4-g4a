<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usuario';  // Asegúrate de que el nombre de la tabla sea correcto
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['rol', 'alias', 'password', 'correo', 'nombre', 'pais', 'ciudad', 'direccion', 'cod_postal'];
    protected $returnType = 'array';

    public function verifyUser($alias, $password)
{
    $builder = $this->db->table('usuario');
    $user = $builder->getWhere(['alias' => $alias, 'password' => $password])->getRowArray();

    if ($user) {
        return $user;  // Devuelve toda la fila, incluido el rol
    } else {
        return false;
    }
}

public function deleteRelatedEntities($id)
    {
        $db = db_connect();

        try {
            $db->transStart();

            $db->table('pedido')->where('id_usuario', $id)->delete();
            $db->table('tarjeta')->where('id_usuario', $id)->delete();
            $db->table('descuento')->where('id_usuario', $id)->delete();

            $db->transComplete();

            return $db->transStatus();
        } catch (\Exception $e) {
            // Log the error
            log_message('error', 'Error en deleteRelatedEntities: ' . $e->getMessage());
            return false;
        }
    }

}
