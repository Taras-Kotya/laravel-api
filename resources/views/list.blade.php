<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>


<body>
    <h1>Виводжу базу:</h1>
    <table border="1" class='table table-striped'>
        <thead>
            <tr>
                <th scope="col"> @sortablelink('id', 'ID') </th>
                <th scope="col"> @sortablelink('name','Ім\'я') </th>
                <th scope="col"> @sortablelink('gos_nomer','Держ. номер') </th>
                <th scope="col"> @sortablelink('color','Колір') </th>

                <th scope="col"> @sortablelink('vin','VIN') </th>
                <th scope="col"> @sortablelink('brand','Марка авто') </th>
                <th scope="col"> @sortablelink('model','Модель') </th>
                <th scope="col"> @sortablelink('year', 'Рік') </th>

                <th scope="col"> [*] </th>
                <th scope="col"> [x] </th>
        </thead>
        <tbody>
            @if(count($list))
            @foreach($list as $asd)
            <tr>
                <th scope="col"> {{ $asd->id }} </th>
                <th scope="col"> {{ $asd->name }} </th>
                <th scope="col"> {{ $asd->gos_nomer }} </th>
                <th scope="col"> {{ $asd->color }} </th>

                <th scope="col"> {{ $asd->vin }} </th>
                <th scope="col"> {{ $asd->brand }} </th>
                <th scope="col"> {{ $asd->model }} </th>
                <th scope="col"> {{ $asd->year }} </th>
                <th scope="col">
                    <a href="{{ route('auto_red_form', $asd->id) }}" target="" rel="">
                        <button>Редагувати</button>
                    </a>
                </th>
                <th scope="col">
                    <form method="POST" action="/api/V1/auto/{{$asd->id}}">
                        {{ method_field('DELETE') }}
                        {{ Form::submit('Удалить'); }}
                        {{ Form::close() }}
                </th>
            </tr>
            @endforeach
            @endif
    </table>


    {{ $list->links() }}

    <hr>
    <h3>
        <a href="{{ url()->full() }}&export_xls=page" target="_blank" rel="noopener noreferrer">
            <button>Експортировать текущую страницу в XLS</button>
        </a>
        <br>
        <a href="{{ url()->full() }}&export_xls=all" target="_blank" rel="noopener noreferrer">
            <button>Експортировать весь результат в XLS</button>
        </a>
    </h3>


    @extends('copy')


</body>

</html>