@extends('layouts.app')

@section('title-block')Главная@endsection

@section('content')
<div class = mainmenu>
<link href="{{URL::asset('css/app.css')}}" rel = stylesheet>
<script src = "{{URL::asset('js/app.js')}}"></script>
<h1>Все Книги</h1>
</div>
@foreach($data as $el)
<div class="alert alert-info">
    <h3>{{$el->name}}</h3>
    <p>{{$el->genre}}</p>
    <p>{{$el->avtor}}</p>
    <p>{{$el->data}}</p>
    <a href="{{ route('books-data-one', $el->id )}}"><button class="btn btn-warning">Подробнее</button></a>
    <form action="{{ route('addfavourite-form') }}" method="POST">
    @csrf
    <input type="hidden" name="book_id" value="{{ $el->id }}">
    @if (Auth::check() && auth()->user()->favorite && auth()->user()->favorite->contains($el))
    <p class="mt-3"><span class="btn btn-warning disabled">Уже в избранных</span></p>
    @elseif (Auth::check())
    <p></p>
    <button type="submit" class="btn btn-warning">Добавить в избранное</button>
    @endif
</form>

</div>

@endforeach
@endsection