@extends('layouts.default')
@section('title')
    Liste des todos
@endsection
@section('content')
    <a href="{{route('todos.new')}}" class="btn btn-primary">Créer un todo</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Titre</th>
            <th scope="col">Validé</th>
            <th scope="col">Crée le</th>
            <th scope="col">Modifié le</th>
            <th scope="col" colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($liste as $todo)
        <tr>
            <td>{{$todo->getId()}}</td>
            <td>{{$todo->getText()}}</td>
            <td>@if($todo->isChecked())<i class="bi bi-check"></i> @endif</td>
            <td>{{$todo->getCreatedAt()->format('d/m/Y')}}</td>
            <td>{{$todo->getUpdatedAt()->format('d/m/Y')}}</td>
            <td><a href="{{route('todos.get',['id'=> $todo->getId()])}}"><i class="bi bi-pencil-square"></i></a></td>
            <td><a href="{{route('todos.delete',['id'=> $todo->getId()])}}"><i class="bi bi-file-x-fill"></i></a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
