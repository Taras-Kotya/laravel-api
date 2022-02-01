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
                <th scope="col"> @sortablelink('name','Назва Бренду') </th>
                <th scope="col"> @sortablelink('creator_id', 'ID у создателей') </th>
        </thead>
        <tbody>
            @if(count($data))
            @foreach($data as $asd)
            <tr>
                <th scope="col"> {{ $asd->id }} </th>
                <th scope="col"> {{ $asd->name }} </th>
                <th scope="col"> {{ $asd->creator_id }} </th>
            </tr>
            @endforeach
            @endif
    </table>


    {{ $data->links() }}

    <hr>
    <h3>
        <a href="{{ route('brand_export') }}" target="_blank" rel="noopener noreferrer">
            <button>Обновить список брендов (загрузка из постороннего ресурса, 500 шт)</button>
        </a>
    </h3>
    <div style='padding-top:15px'>
        <center>
            <small>
                <tt>© Taras-Kotya</tt>
            </small>
        </center>
    </div>

</body>

</html>