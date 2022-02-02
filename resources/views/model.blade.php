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
    @if(!empty($data[0]->Make_ID))
    <h1> Моделі бренду: <u>{{ $data[0]->Make_Name }}</u></h1>
    @else
    <h1> Всі моделі</h1>
    @endif
    <table border="1" class='table table-striped'>
        <thead>
            <tr>
                <th scope="col"> @sortablelink('id', 'ID') </th>
                <th scope="col"> @sortablelink('Model_Name','Назва Модели') </th>
                <th scope="col"> @sortablelink('Model_ID', 'ID модели') </th>
        </thead>
        <tbody>
            @if(count($data))
            @foreach($data as $asd)
            <tr>
                <th scope="col"> {{ $asd->id }} </th>
                <th scope="col"> {{ $asd->Model_Name }} </th>
                <th scope="col"> {{ $asd->Model_ID }} </th>
            </tr>
            @endforeach
            @endif
    </table>


    {{ $data->links() }}




    @extends('copy')


</body>

</html>