<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CardModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('users/index', $data);
    }

    public function search()
    {
        $model = new UserModel();
        $search = $this->request->getVar('busqueda');
        $data['users'] = $model->like('alias', $search)->orLike('correo', $search)->findAll();
        return view('users/manage', $data);
    }

    public function manage()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('users/manage', $data);
    }

    public function delete($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('rol') !== 'administrador') {
            return redirect()->to('/login');
        }

        $model = new UserModel();
        if ($model->delete($id)) {
            session()->setFlashdata('success', 'Usuario eliminado correctamente.');
        } else {
            session()->setFlashdata('error', 'Error al eliminar el usuario.');
        }

        return redirect()->to('/gestionar_usuarios');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $user = $model->find($id);
        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Usuario no encontrado");
        }
        return view('users/edit', ['user' => $user]);
    }

    public function update()
    {
        $model = new UserModel();
        $id = $this->request->getPost('id_usuario');
        $data = [
            'alias' => $this->request->getPost('alias'),
            'correo' => $this->request->getPost('correo'),
            'nombre' => $this->request->getPost('nombre'),
            'pais' => $this->request->getPost('pais'),
            'ciudad' => $this->request->getPost('ciudad'),
            'direccion' => $this->request->getPost('direccion'),
            'cod_postal' => $this->request->getPost('cod_postal')
        ];

        if ($model->update($id, $data)) {
            return redirect()->to('gestionar_usuarios')->with('message', 'Usuario actualizado correctamente');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error al actualizar el usuario');
        }
    }

    public function listCards($userId)
    {
        $model = new CardModel();
        $data['cards'] = $model->where('id_usuario', $userId)->findAll();
        return view('users/cards', $data);
    }

    public function editCard($cardId)
{
    $model = new CardModel();
    $card = $model->find($cardId);

    if (!$card) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Tarjeta no encontrada");
    }

    // Asumiendo que la tarjeta incluye el 'id_usuario'
    return view('users/edit_card', ['card' => $card, 'user_id' => $card['id_usuario']]);
}

    

    public function updateCard()
    {
        $model = new CardModel();
        $cardId = $this->request->getPost('id_tarjeta');
        $data = [
            'numero' => $this->request->getPost('numero'),
            'caducidad' => $this->request->getPost('caducidad'),
            'titular' => $this->request->getPost('titular')
        ];

        if ($model->update($cardId, $data)) {
            return redirect()->to('/users/cards/'.$this->request->getPost('id_usuario'))->with('message', 'Tarjeta actualizada correctamente.');
        } else {
            return redirect()->back()->with('error', 'Error al actualizar la tarjeta.');
        }
    }
}
