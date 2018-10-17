<?php

namespace App\Controllers;

use App\Todo;
use App\Controllers\Controller;
use Bow\Http\Request;

class TodoController extends Controller
{
    /**
     * Point d'entré
     *
     * GET /todos
     *
     * @return void
     */
    public function index()
    {
        return Todo::all();
    }

    /**
     * Permet d'ajouter une nouvelle résource dans la base d'information
     *
     * POST /todos
     *
     * @return void
     */
    public function store(Request $request)
    {
        $todo = [
            'text' => $request->get('text'),
            'done' => false
        ];

        Todo::create($todo);
        
        return ['message' => 'ok', 'error' => false];
    }

    /**
     * Mise à jour d'une résource
     *
     * PUT /todos/:id
     *
     * @param mixed $id
     * @return void
     */
    public function update($id)
    {
        $todo = Todo::find($id);

        if (is_null($todo)) {
            return [
                'message' => "cannot find task !",
                'error' => true
            ];
        }

        $todo->done = !((bool) $todo->done); 

        $todo->save();

        return ['message' => 'ok', 'error' => false];
    }

    /**
     * Permet de supprimer une resource
     *
     * DELETE /todos/:id
     *
     * @param mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);

        if (is_null($todo)) {
            return [
                'message' => "cannot find task !",
                'error' => true
            ];
        }

        $todo->delete();

        return ['message' => 'ok', 'error' => false];
    }
}
