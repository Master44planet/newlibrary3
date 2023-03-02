@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Избранное</h1>
        @if ($favourite->isEmpty())
            <p>У вас нет книг в избранных!</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Автор</th>
                        <th>Жанр</th>
                        <th>Дата публикации</th>
                        <th>Действие:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($favourite as $fav)
                        <tr>
                            <td>{{ $fav->name }}</td>
                            <td>{{ $fav->avtor }}</td>
                            <td>{{ $fav->genre }}</td>
                            <td>{{ $fav->data }}</td>
                            <td>
                                <a href="{{ route('books-data-one', $fav->id) }}" class="btn btn-primary">Подробнее</a>
                                <form action="{{ route('favourite-destroy', $fav->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Убрать</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection