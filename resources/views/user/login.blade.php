@extends('layouts.user')

@section('content')
    <div class="container-lg">
        <h4>Введите данные своей учетной записи</h4>
        <form method="POST" action="/user/verify">
            <div class="mb-3">
                <label for="name">Имя:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Введите имя">
            </div>
            <div class="mb-3">
                <label for="password">Пароль:</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Введите пароль">
            </div>
            <span>
                <button type="submit" class="btn btn-success btn-sm">Войти</button>
                <a class="btn btn-outline-primary btn-sm" href={{'/user/register'}}>Зарегистрироваться</a>
            </span>
        </form>
    </div>

@endsection
