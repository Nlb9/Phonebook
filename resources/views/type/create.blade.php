<!--application/views/contact/create.blade.php-->

@extends('layouts.default')

@section('content')

    <div class="container-lg">
        <form method="POST" action="/type/insert">
            @csrf
            <div class="mb-3">
                <label for="type">Название типа:</label>
                <input type="text" class="form-control" id="type" name="type" placeholder="Введите название типа">
            </div>
            <span>
            <button type="submit" class="btn btn-success btn-sm">Добавить</button>
            <a class="btn btn-outline-danger btn-sm" href=<?= "/type/read" ?>>Отмена</a>
        </span>
        </form>
@endsection
