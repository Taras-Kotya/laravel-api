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
    <h1>База брендов:</h1>
    <table border="1" class='table table-striped'>
        <thead>
            <tr>
                <th scope="col"> @sortablelink('id', 'ID') </th>
                <th scope="col"> @sortablelink('Make_Name','Назва Бренду') </th>
                <th scope="col"> @sortablelink('Make_ID', 'ID бренда') </th>
        </thead>
        <tbody>
            @if(count($data))
            @foreach($data as $asd)
            <tr>
                <th scope="col"> {{ $asd->id }} </th>
                <th scope="col"> {{ $asd->Make_Name }} </th>
                <th scope="col"> <a href="{{ route('model', $asd->Make_ID ) }} " >ID {{ $asd->Make_ID }}</a> </th>
            </tr>
            @endforeach
            @endif
    </table>


    {{ $data->links() }}



    <br>
    <br>
    <hr>

    <h2>Автооновлення бази CRON:</h2>
    <p>
        (кожного 1 числа, щомісяця, опівночі)
    </p>
    <div style="border: 1px solid #aaa; padding: 3px; background: #ddd; max-width: 35%">
        <code>
            0 0 1 * * {{ route('brand_get') }}
        </code>
    </div>
    <br>
    <p>
        (парсинг, по 10 шт - сто мільйонів годин)
    </p>
    <div style="border: 1px solid #aaa; padding: 3px; background: #ddd; max-width: 35%">
        <code>
            * 1 1 * * {{ route('brand_json', 10) }}
        </code>
    </div>


    @extends('copy')


</body>

</html>