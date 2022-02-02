<?php
if (!empty($list)) {
    $array = json_decode(json_encode($list), 1);

    $ar['data'] = array();
    foreach ($array['data'] as $value) {
        unset($value['created_at']);
        unset($value['updated_at']);
        $ar['data'][] = $value;
    }
    echo (json_encode($ar));
    exit;
}
?>
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



<h1>Пошук:</h1>
{{ Form::open(array('method' => 'get', 'url' => 'list/search')) }}
<p>
    {{ Form::label('search', 'Пошук певного слова  (в імені/номері/VIN-коді):', array('class' => 'awesome')) }} <br>
    {{ Form::text('search', '', ['placeholder' => 'Введіть','required']);}}
</p>
<p>
    <h5>Не шукати записи що містять:</h5>
<p>
    {{ Form::text('unsort_brand', '', ['placeholder' => 'Марку машини']);}} <br>
    {{ Form::text('unsort_model', '', ['placeholder' => 'Модель']);}} <br>
    {{ Form::text('unsort_year', '', ['placeholder' => 'Рік']);}} <br>
</p>
<p>
    {{ Form::submit('Поиск!'); }}
</p>
{{ Form::close() }}



@extends('copy')

</body>

</html>