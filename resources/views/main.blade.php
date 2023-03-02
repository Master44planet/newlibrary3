@extends('layouts.app')

@section('title-block')Главная@endsection

@section('content')
<div class="container-fluid px-0">
        <div class="row align-items-center justify-content-center mx-0" style="height: 100vh; position: relative;">
            <img src="{{ asset('img/bg2.jpg') }}" alt="Books Background" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; object-position: center;">
            <div class="col-lg-6 text-center" style="color: #FFFFFF; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); ">
                <h1 class="text-outline">Добро пожаловать в нашу онлайн библиотеку!</h1>
                <p></p>
                <center>
                @if (Auth::check()&& Auth::user()->role_id === 2)
                <div class ="btn1">
                    <a href="books"><button class="btn btn-warning ">Добавить книгу</button></a>
                    </div>
                <div class = "btn4">
                    <a href="{{route('books-export')}}"><button class="btn btn-warning">Csv Format</button></a>
                    </div>
                    @endif
                <div class ="btn2">
                    <a href="books/all"><button class="btn btn-warning">Все книги</button></a>
                        </div>
                @if (Auth::check())
                <div class = "btn3">
                    <a href="{{route('addfavourite-data')}}"><button class="btn btn-warning">Избранное</button></a>
                        </div>
                    @endif
            
                </center>
            </div>
        </div>
</div>
@endsection