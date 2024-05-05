<?php

namespace App\Models;

use CodeIgniter\Model;

class CardModel extends Model
{
    protected $table = 'tarjeta';
    protected $primaryKey = 'id_tarjeta';
    protected $allowedFields = ['numero', 'caducidad', 'titular', 'id_usuario'];

    // Obtener todas las tarjetas de un usuario específico
    public function getCardsByUserId($userId)
    {
        return $this->where('id_usuario', $userId)->findAll();
    }

    // Obtener detalles de una tarjeta específica
    public function getCardById($cardId)
    {
        return $this->find($cardId);
    }

    // Actualizar los detalles de una tarjeta
    public function updateCard($cardId, $data)
    {
        return $this->update($cardId, $data);
    }

    public function getUserIdFromCard($cardId)
    {
        $card = $this->find($cardId);
        return $card ? $card['id_usuario'] : null;
    }
}
