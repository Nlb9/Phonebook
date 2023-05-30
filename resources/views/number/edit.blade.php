@extends('layouts.default')

@section('content')
    <div class="container-lg">
        <form method="POST" action=<?="/number/" . $params['id'] . "/update"?>>
            @csrf
            <div class="mb-3">
                <h4>Внесите изменения для текущего номера</h4>
            </div>
            <div class="mb-3">
                <label for="number">Номер:</label>
                <input type="text" class="form-control" id="number" name="number" value="<?=$params["number"]?>"
                       placeholder="Укажите номер">
            </div>
            <div class="mb-3">
                <select class="form-select" name="type">
                    <option selected="selected" value="{{$params['type']['id']}}">{{$params['type']['type']}}</option>
                    @foreach($types as $type)
                        <option value={{$type['id']}}>{{$type['type']}}</option>
                    @endforeach
                </select>
            </div>
            <span>
                <button type="submit" class="btn btn-success btn-sm">Сохранить</button>
                <a class="btn btn-outline-danger btn-sm" href={{'/contact/read'}}>Отмена</a>
            </span>
        </form>
    </div>
@endsection
