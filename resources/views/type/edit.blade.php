@extends('layouts.default')
@section('content')
    <div class="container-lg">
        <form method="POST" action=<?="/type/" . $params['id'] . "/update"?>>
            @csrf
            <div class="mb-3">
                <label for="type">Внесите изменения:</label>
                <input type="text" class="form-control" id="type" name="type" value="<?=$params["type"]?>"
                       placeholder="Введите название типа">
            </div>
            <span>
                <button type="submit" class="btn btn-success btn-sm">Добавить</button>
                <a class="btn btn-outline-danger btn-sm" href=<?= "/type/read" ?>>Отмена</a>
            </span>
        </form>
@endsection
