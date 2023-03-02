@extends('layouts.app')
@section('content')
<h1>Добавление в Избранное</h1>
<form action="{{ route('addfavourite-form') }}" method="post">
    @csrf
    <div class ="form-group">
        <label for="name">Название книги</label>
        <input type = "text" name ="name" id="name" class="form-control">
    </div>
    <br>
    <div class ="form-group">
        <label for="genre">Жанр книги</label>
        <input type = "text" name ="genre" id="genre" class="form-control">
    </div>
    <br>
    <div class ="form-group">
        <label for="avtor">Автор книги</label>
        <input type = "text" name ="avtor" id="avtor" class="form-control">
    </div>
    <br>
    <div class ="form-group">
        <label for="data">Дата выпуска книги</label>
        <input type = "data" name ="data" id="data" class="form-control">
    </div>
    <br>
    <button type="submit" class ="btn btn-success">Добавить</button>
</form>
@endsection