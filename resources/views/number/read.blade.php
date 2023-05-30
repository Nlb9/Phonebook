@extends('layouts.default')

@section('content')
    <div class="container-lg">
        <h4>Номера контакта: <span class="badge" style="background-color: #5d76cb;">{{$contName}}</span></h4>
        <table class="table">
            <thead style="background-color: #c5d0e6;">
            <tr>
                <td>ID</td>
                <td>Номер</td>
                <td>Тип</td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            <tr>
                <td>
                    <a class="btn btn-outline-success btn-sm" href={{'/contact/' . $cont_id . '/number/create'}}>Добавить</a>
                </td>
            </tr>
            @foreach($number_array as $number)
                <tr>
                    <td>{{$number['id']}}</td>
                    <td>{{$number['number']}}</td>
                    <td>{{$number['type']['type']}}</td>
                    <td>
                        <a class="btn btn-outline-primary btn-sm" href="<?='/number/' . $number['id'] . '/edit'?>">Изменить</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-danger btn-sm" href="<?='/number/' . $number['id'] . '/remove'?>">Удалить</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
