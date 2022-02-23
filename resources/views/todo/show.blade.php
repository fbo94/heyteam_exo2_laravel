@extends('layouts.default')
@section('title')
    Todo {{$todo->getText()}} du {{$todo->getCreatedAt()->format('d/m/Y')}}
@endsection
@section('content')

    <form action="{{route('todos.update',['id'=>$todo->getId()])}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="text" class="form-label">Texte de la tâche</label>
            <input name="text_todo" type="text" class="form-control" id="textTodo" value="{{$todo->getText()}}">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="isDone" name="is_done"
                   @if($todo->isChecked()) checked @endif>
            <label class="form-check-label" for="is_done">Tâche réalisée ?</label>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
