<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<!-- ($name, $gos_nomer, $color, $vin) -->

<?php
class ColorAuto
{
    public function List()
    {
        static $ColorAutoAllArray = array(
            'green' => 'Зелений',
            'white' => 'Білий',
            'red' => 'Червоний'
        );
        return $ColorAutoAllArray;
    }
}

function generate_string($strength = 0)
{
    $input = 'abcdefghijklmnopqrstuvwxyz';
    if ($strength == 0) $strength = rand(3, 8);

    $input_length = strlen($input);
    $random_string = '';
    for ($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

    return ucwords($random_string);
}
?>



<body>
    <h1>Додати в БД:</h1>
    {{ Form::open(array('url' => 'api/V1/auto')) }}
    <p>

        {{ Form::label('name', 'Ваше ім\'я', array('class' => 'awesome')) }}<br>
        {{ Form::text('name', ucwords(generate_string()).' '.ucwords(generate_string()), ['placeholder' => 'Ivan Ivanov','required']);}}
    </p>
    <p>
        {{ Form::label('gos_nomer', 'Номер авто:', array('class' => 'awesome')) }} <br>
        {{ Form::text('gos_nomer', strtoupper(generate_string(2)).' '.rand(1111,9999).' '.strtoupper(generate_string(2)), ['placeholder' => 'АВ 1234 СС','required']);}}
    </p>
    <p>
        {{ Form::label('color', 'Колір', array('class' => 'awesome')) }}<br>
        {{ Form::select('color', ColorAuto::List() );}}
    </p>
    <p>
        {{ Form::label('vin', 'VIN', array('class' => 'awesome')) }}<br>
        {{ Form::text('vin', '3FA6P0VP1HR282209', ['placeholder' => '3FA6P0VP1HR282209','required']);}}
    </p>
    <p>
        {{ Form::submit('Сохранить!'); }}
    </p>
    {{ Form::close() }}


    <br>
    <br>
    <br>


    <br>
    <br>
    <hr>

    <h3>Автозаповнення:</h3>
    <div style="border: 1px solid #aaa; padding: 3px; background: #ddd; max-width: 35%">
        <code>
            <font color='green'>#</font> php artisan tinker
        </code>
    </div>
    <br>
    <div style="border: 1px solid #aaa; padding: 3px; background: #ddd; max-width: 35%">
        <code>
            <font color='red'>>>></font> Auto::factory()->count(300)->create()
        </code>
    </div>



    @extends('copy')

</body>

</html>