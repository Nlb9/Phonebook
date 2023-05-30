<!--application/views/contact/create.blade.php-->

@extends('layouts.default')

@section('content')
    <div class="container-lg">
        <h4>Добавьте контакт</h4>
        <form method="POST" action="/contact/insert">
            @csrf
            <div class="mb-3">
                <label for="name">Имя:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Введите имя">
            </div>
            <div class="mb-3">
                <label for="birthday">Дата рождения:</label>
                <input type="text" class="form-control" id="datepicker" name="birthday"
                       placeholder="Укажите дату рождения">
            </div>
            <span>
                <button type="submit" class="btn btn-success btn-sm">Добавить</button>
                <a class="btn btn-outline-danger btn-sm" href={{'/contact/read'}}>Отмена</a>
            </span>
        </form>
    </div>
@endsection
