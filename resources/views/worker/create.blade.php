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
    <h3>Create page</h3>
    <div>
        <hr>
        <div>
            <form action="{{ route('workers.store') }}" method="Post">
                @csrf
                <div style="margin-bottom: 15px;"><input type="text" name="name" placeholder="Имя"></div>
                <div style="margin-bottom: 15px;"><input type="text" name="surname" placeholder="Фамилия"></div>
                <div style="margin-bottom: 15px;"><input type="email" name="email" placeholder="Емейл"></div>
                <div style="margin-bottom: 15px;"><input type="number" name="age" placeholder="Возраст"></div>
                <textarea name="description" placeholder="Описание"></textarea>
                <div style="margin-bottom: 15px;">
                    <input id="married" type="checkbox" name="is_married">
                    <label for="married">Женат(а)</label>
                </div>
                <div style="margin-bottom: 15px;"><input type="submit" value="Добавить"></div>
            </form>
        </div>
    </div>
</body>
</html>
