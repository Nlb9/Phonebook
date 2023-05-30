@extends('layouts.default')
@section('content')
    <div class="container-lg">
        <form method="POST" action={{"/contact/".$params['id']."/update"}}>
            @csrf
            <div class="mb-3">
                <label for="name">Имя:</label>
                <input type="text" class="form-control" id="name" name="name" value={{$params["name"]}}>
            </div>
            <div class="mb-3">
                <label for="birthday">Дата рождения:</label>
                <input type="text" class="form-control" id="datepicker" name="birthday"
                       value={{$params->getBirthday()}}>
            </div>
            <span>
         <button type="submit" class="btn btn-success btn-sm">Сохранить</button>
         <a class="btn btn-outline-danger btn-sm" href={{'/contact/read'}}>Отмена</a>
     </span>
        </form>
    </div>
@endsection
