<?php

namespace App\Http\Controllers;

use App\Domain\Todos\Modules\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TodoController extends \Illuminate\Routing\Controller
{
    /**
     * @var Requests
     */
    private $todoModule;

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
        $todo = $this->todoModule->get($id);
        $todo->setText($request->get('text_todo'));
        $todo->setChecked($request->get('is_done', false));

        $this->todoModule->update($todo);

        return redirect(route('todos.get', ['id' => $id]));
    }

    public function create(Request $request): RedirectResponse
    {
        $this->todoModule->create($request->get('is_done', false), $request->get('text_todo'));

        return redirect(route('todos.index'));
    }

    public function delete(string $id): RedirectResponse
    {
        $todo = $this->todoModule->get($id);
        $this->todoModule->delete($todo->getId());

        return redirect(route('todos.index'));
    }
}
