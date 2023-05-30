<!--application/views/number/create.blade.php-->

@extends('layouts.default')

@section('content')
    <div class="container-lg">
        <form method="POST" action=<?="/contact/" . $params['id'] . '/number/insert'?>>
            @csrf
            <div class="mb-3">
                <h4>Добавьте номер для контакта:<span class="badge" style="background-color: #5d76cb;">{{$params['name']}}</span></h4>
            </div>
            <div class="mb-3">
                <label for="number">Номер:</label>
                <input type="text" class="form-control" id="number" name="number"
                       placeholder="Укажите номер">
            </div>
            <div class="mb-3">
                <select class="form-select" name="type">
                    <option selected>Выберите тип номера</option>
                    @foreach($types as $type)
                        <option value={{$type['id']}}>{{$type['type']}}</option>
                    @endforeach
                </select>
            </div>
            <span>
                <button type="submit" class="btn btn-success btn-sm">Добавить</button>
                <a class="btn btn-outline-danger btn-sm" href={{'/contact/' . $params['id'] . '/read'}}>Отмена</a>
            </span>
        </form>
    </div>
@endsection
