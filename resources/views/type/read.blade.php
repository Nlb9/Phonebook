@extends('layouts.default')

@section('content')
    <div class="container-lg">
        <h4>Типы номеров</h4>
        <table class="table">
            <thead style="background-color: #c5d0e6;">
            <tr>
                <td>ID</td>
                <td>Тип номера</td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            <tr>
                <td>
                    <a class="btn btn-outline-success btn-sm" href={{'/type/create'}}>Добавить</a>
                </td>
            </tr>
            @foreach($type_array as $row)
                <tr>
                    <td>{{$row['id']}}</td>
                    <td>{{$row['type']}}</td>
                    <td>
                        <a class="btn btn-outline-primary btn-sm"
                           href="<?='/type/' . $row['id'] . '/edit'?>">Изменить</a>
                    </td>
                    <td>
                        <a class="btn btn-outline-danger btn-sm"
                           href="<?='/type/' . $row['id'] . '/remove'?>">Удалить</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
