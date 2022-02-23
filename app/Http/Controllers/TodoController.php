<?php

namespace App\Http\Controllers;

use App\Domain\Todos\Modules\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class TodoController extends \Illuminate\Routing\Controller
{
    private Requests $todoModule;

    public function __construct(Requests $todoModule)
    {
        $this->todoModule = $todoModule;
    }

    public function index(): View
    {
        $liste = $this->todoModule->liste();

        return view('todo.index', ['liste' => $liste]);
    }

    public function show(string $id): View
    {
        $todo = $this->todoModule->get($id);

        return view('todo.show', ['todo' => $todo]);
    }

    public function new(): View
    {
        return view('todo.create');
    }

    public function update(string $id, Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'text_todo' => 'required',
            ],
            [
                'text_todo.required' => 'Le texte de todo doit être renseigné'
            ]
        );

        if ($validated) {
            session()->flash('success', 'Todo modifié avec succès');
        } else {
            session()->flash('error', 'Merci de renseigner le texte du todo');
        }

        try {
            $todo = $this->todoModule->get($id);
            $todo->setText($request->get('text_todo'));
            $todo->setChecked($request->get('is_done', false));
            $this->todoModule->update($todo);

            session()->flash('error', 'Mise à jour réussi du todo');
        } catch (BadRequestException $e) {
            session()->flash('error', 'Erreur lors de la mise à jour du todo');
        }
        return redirect(route('todos.get', ['id' => $id]));
    }

    public function create(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'text_todo' => 'required',
            ],
            [
                'text_todo.required' => 'Le texte de todo doit être renseigné'
            ]
        );

        if ($validated) {
            session()->flash('success', 'Todo ajouté avec succès');
        } else {
            session()->flash('error', 'Merci de renseigner le texte du todo');
        }

        try {
            $this->todoModule->create($request->get('is_done', false), $request->get('text_todo'));
            session()->flash('success', 'Todo crée avec succès');
        } catch (BadRequestException $e) {
            session()->flash('error', 'Erreur lors de la création du todo');
        }

        return redirect(route('todos.index'));
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            $todo = $this->todoModule->get($id);
            $this->todoModule->delete($todo->getId());
            session()->flash('success', 'Todo ID : ' . $id . ' supprimé avec succès');
        } catch (BadRequestException $e) {
            session()->flash('error', 'Merci de renseigner le texte du todo');
        }

        return redirect(route('todos.index'));
    }
}
