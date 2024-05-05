<?php
namespace App\Models;

use CodeIgniter\Model;

class GameModel extends Model
{
    protected $table = 'juego';
    protected $primaryKey = 'id_juego';
    protected $allowedFields = ['plataforma', 'titulo', 'precio', 'rebaja', 'stock', 'formato', 'id_info'];

    public function getGameDetails() {
        $builder = $this->db->table('info_juego');
        $builder->select('*');
        $builder->orderBy('titulo_juego', 'ASC');
        return $builder->get()->getResult();
    }

    public function checkGameExists($titulo, $plataforma) {
        return $this->where(['titulo' => $titulo, 'plataforma' => $plataforma])->first();
    }

    public function checkInfoExists($titulo) {
        $builder = $this->db->table('info_juego');
        $builder->select('*');
        $builder->where('titulo_juego', $titulo);
        return $builder->get()->getRow();
    }

    public function insertGame($data) {
        $db = db_connect();
        $db->transStart();

        // Check if info exists and get id_info
        $infoExists = $this->checkInfoExists($data['titulo']);
        if (!$infoExists && (!empty($data['descripcion']) && !empty($data['genero']) && !empty($data['imagen']))) {
            $db->table('info_juego')->insert([
                'titulo_juego' => $data['titulo'],
                'genero' => $data['genero'],
                'descripcion' => $data['descripcion'],
                'imagen' => $data['imagen']
            ]);
            $data['id_info'] = $db->insertID();
        } elseif ($infoExists) {
            $data['id_info'] = $infoExists->id_info;
        } else {
            $db->transRollback();
            return false; // Missing info data
        }

        // Check if game exists
        if ($this->checkGameExists($data['titulo'], $data['plataforma'])) {
            $db->transRollback();
            return false; // Game exists
        }

        unset($data['genero'], $data['descripcion'], $data['imagen']);
        $this->insert($data);
        $db->transComplete();
        return $db->transStatus();
    }
}
