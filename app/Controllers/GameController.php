<?php
namespace App\Controllers;

use App\Models\GameModel;
use CodeIgniter\Controller;

class GameController extends Controller
{
    public function index()
    {
        return redirect()->to('gestionar_videojuegos');
    }

    public function manageGames()
    {
        return view('games/gestionar_videojuegos');
    }

    public function listGames() {
        $model = new GameModel();
        $data['games'] = $model->findAll();
        return view('games/list_games', $data);
    }

    public function addGame() {
        $model = new GameModel();
        $data['info_juegos'] = $model->getGameDetails();
        return view('games/add_game', $data);
    }
    
    public function create() {
        $model = new GameModel();
        $data = $this->request->getPost();

        if ($model->insertGame($data)) {
            return redirect()->to('games/list')->with('success', 'Juego añadido correctamente.');
        } else {
            return redirect()->back()->with('error', 'No se pudo añadir el juego. Puede que ya exista o falten datos.');
        }
    }
    public function editGame($id)
    {
        $model = new GameModel();
        $data['game'] = $model->find($id);
        return view('games/edit_game', $data);
    }

    public function updateGame()
    {
        $model = new GameModel();
        $id = $this->request->getPost('id_juego');
        $data = $this->request->getPost();
        $model->update($id, $data);
        return redirect()->to('games/list')->with('success', 'Juego actualizado correctamente.');
    }

    public function deleteGame($id)
    {
        $model = new GameModel();
        $model->delete($id);
        return redirect()->to('games/list')->with('success', 'Juego eliminado correctamente.');
    }
}
