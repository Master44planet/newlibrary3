@extends('layouts.app')

@section('content')
<h1>Редактирование данных книги</h1>
<br>

<form action="{{ route('update-message-submit', $data->id) }}" method="post">
    @csrf
    <div class ="form-group">
        <label for="name">Название книги</label>
        <input type = "text" name ="name" value="{{$data->name}}" id="name" class="form-control">
    </div>
    <br>
    <div class ="form-group">
        <label for="genre">Жанр книги</label>
        <input type = "text" name ="genre" value="{{$data->genre}} id="genre" class="form-control">
    </div>
    <br>
    <div class ="form-group">
        <label for="avtor">Автор книги</label>
        <input type = "text" name ="avtor" value="{{$data->avtor}} id="avtor" class="form-control">
    </div>
    <br>
    <div class ="form-group">
        <label for="data">Дата выпуска книги</label>
        <input type = "data" name ="data" value="{{$data->data}} id="data" class="form-control">
    </div>
    <br>
    <button type="submit" class ="btn btn-success">Обновить</button>
    <a href="{{ route('delete-message' , $data->id )}}"><button class="btn btn-danger">Удалить</button></a>
</form>
@endsection