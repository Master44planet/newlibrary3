@extends('layouts.app')

@section('title-block')Главная@endsection

@section('content')
<div class = mainmenu>
<link href="{{URL::asset('css/app.css')}}" rel = stylesheet>
<script src = "{{URL::asset('js/app.js')}}"></script>
@if($data)
    <h1>{{$data->name}}</h1>
    <div class="alert alert-info">
        <p>{{$data->genre}}</p>
        <p>{{$data->avtor}}</p>
        <p>{{$data->data}}</p>
        @if (Auth::check()&& Auth::user()->role_id === 2)
        <a href="{{ route('update-message' , $data->id )}}"><button class="btn btn-primary">Редактировать</button></a>
        <a href="{{ route('delete-message' , $data->id )}}"><button class="btn btn-danger">Удалить</button></a>
  
  </div>
@endif
@else

 <center><h1>Запись не найдена</h1></center>
@endif


@endsection