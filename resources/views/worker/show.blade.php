<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <a href="{{ route('workers.index') }}">Вернуться назад</a>
    </div>
    <h2>Show page - worker with id {{$worker->id}}</h2>
    <div>
        <div>Name: {{ $worker->name }}</div>
        <div>Surname: {{ $worker->surname }}</div>
        <div>Email: {{ $worker->email }}</div>
        <div>Age: {{ $worker->age }}</div>
        <div>Description: {{ $worker->description }}</div>
        <div>Is married: {{ $worker->is_married }}</div>
    </div>
</body>
</html>
