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


<h1>Редагувати запис #{{ $data->id }}:</h1>
{{ Form::open(array('url' => route('auto_update', $data->id))) }}

@foreach($AutoNameArray as $key => $value)
<p>
    {{ Form::label($key, $value, array('class' => 'awesome')) }} <br>
    {{ Form::text($key, $data->$key, ['required']);}}
</p>
@endforeach

<p>
    {{ Form::submit('Зберегти'); }}
</p>
{{ Form::close() }}


@extends('copy')


</body>

</html>