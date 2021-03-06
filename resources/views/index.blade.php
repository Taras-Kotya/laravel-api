<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Тестове завдання</h1>
    <pre><font color="black">
1. Создать АРІ базы угнанных авто.
2. Эндпоинты:
    a) Добавление авто в базу. Для записи в базу пользователь вводит:
    ▪ имя,
    ▪ гос номер,
    ▪ цвет
    ▪ и вин код (который программно декодируется в:
        • марку,
        • модель
        • год
    ▪ (все записывается в базу для хранения)
    ▪ валидация вводимых значений.
    
    b) Выведение списка угнанных авто с: 
    ▪ пагинацией 
    ▪ сортировкой по всем полям
    ▪ поиском по имени/номерному знаку/по вин-коду в одном поле (в своей базе)
    ▪ фильтрами по марке, модели, году - 3 поля
    c) Редактирование/удаление записей нужна валидация вводимых значений.
    d) Экспорт списка с учетом всех фильтров и сортировок в XLS файл.
    
3. Реализовать автообновление базы марок</a> и моделей, со стороннего ресурса, раз в месяц.
4. Реализовать эндпоинт автокомплит марки</a> и выведение всех моделей этой марки.</font>
    <font color="orange">▪ (поки-що автокомпліт тільки по одному полю)</font>
    </pre>


    <hr>
    <h2>Меню:</h2>
    <ul>
        <p>
            <li>
                <a href="/api/V1/auto"> API база</a> (1)
            </li>
        </p>
        <hr>
        <p>
            <li>
                <a href="/new">Додати новий запис</a> (2.а)
            </li>
        </p>
        <p>
            <li>
                <a href="/list"> Список записів (+пагінація +сортування +редагування)</a> (2.b+c+d)
            </li>
        </p>
        <p>
            <li>
                <a href="/search">Пошук певних записів (+фільтр +експорт)</a> (2.b)
            </li>
        </p>
        <hr>
        <p>
            <li>
                <a href="/brand-all">Вся база брендов</a> (3)
            </li>
        </p>
        <p>
            <li>
                <a href="/brand_get">Завантажити базу брендов (локально в json)</a> (3)
            </li>
        </p>
        <p>
            <li>
                <a href="/brand_json/1">Оновити (з локального файлу)</a> (3)
            </li>
        </p>
        <hr>
        <p>
            <li>
                <a href="{{ route('brand_search') }}">Автокомпліт брендов</a> (4)
            </li>
        </p>

    </ul>

    @extends('copy')

</body>

</html>