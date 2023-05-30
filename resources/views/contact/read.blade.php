@extends('layouts.default')

@section('content')
    <div class="container-lg">
        <h4>Список контактов пользователя: {{--$_SESSION['username']--}}</h4>
        <table class="table table-hover">
            <thead style="background-color: #c5d0e6;">
            <tr>
                <td>ID</td>
                <td>Имя</td>
                <td>Дата рождения</td>
                <td></td>
                <td></td>
            </tr>
            </thead>


    @foreach($contact_array as $row)
        <tr>
            <td>{{$row['id']}}</td>
            <td>
                <a href="<?='/contact/' . $row['id'] . '/number/read'?>">{{$row['name']}}</a>
            </td>
            <td>{{$row->getBirthday()}}</td>
            <td>
                <a class="btn btn-outline-primary btn-sm" href="<?='/contact/' . $row['id'] . '/edit'?>">Изменить</a>
            </td>
            <td>
                <a class="btn btn-outline-danger btn-sm" href="<?='/contact/' . $row['id'] . '/remove'?>">Удалить</a>
            </td>
        </tr>
    @endforeach
</table>
</div>
@endsection
