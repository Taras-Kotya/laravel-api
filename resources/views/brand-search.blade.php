<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Autocomplete</title>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <style>
        .bg-primary {
            background-color: #fff !important;
            color: #ddd !important;
            max-width: 500px;
        }

        .select2-results__option {
            color: #000;
        }

        .container mt-5 {
            max-width: 500px;
        }

        h2 {
            color: #000 !important;
        }
    </style>

</head>

<body class="bg-primary">

    {{ Form::open(array('method' => 'get', 'url' => 'model')) }}
    <div class="container mt-5">
        <h2>Автокомплит бренда</h2>
        <small><tt style="color:orange">(исправить - нужна отдельная база)</tt></small>

        <p>
            <select class="livesearch form-control" name="Make_ID"></select>
        </p>
    </div>
    <p>
        {{ Form::submit('Искать все модели (нереализовано)'); }}
    </p>
    {{ Form::close() }}

</body>
<script type="text/javascript">
    $('.livesearch').select2({
        placeholder: 'Виберіть марку',
        ajax: {
            url: '/ajax_brand',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.Make_Name,
                            id: item.Make_ID
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>

@extends('copy')

</body>

</html>