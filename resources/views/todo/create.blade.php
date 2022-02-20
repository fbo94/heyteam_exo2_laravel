@extends('layouts.default')
@section('content')
    <h1>Nouveau Todo</h1>
    <form action="{{route('todos.create')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="text" class="form-label">Texte de la tâche</label>
            <input name="text_todo" type="text" class="form-control" id="textTodo">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="isDone" name="is_done">
            <label class="form-check-label" for="is_done">Tâche réalisée ?</label>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
