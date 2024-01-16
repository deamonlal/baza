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
    <h2>Index page - workers</h2>
    <br>

    <div>
        <a href="{{ route('workers.create') }}">Создать worker'а</a>
    </div>
    <br>
    <div>
        @foreach($workers as $worker)
            <hr>
            <div>
                <div>Name: {{ $worker->name }}</div>
                <div>Surname: {{ $worker->surname }}</div>
                <div>Email: {{ $worker->email }}</div>
                <div>Age: {{ $worker->age }}</div>
                <div>Description: {{ $worker->description }}</div>
                <div>Is married: {{ $worker->is_married ? 'YES' : 'NO' }}</div>
                <div>
                    <a href="{{ route('workers.show', $worker->id) }}">Посмотреть</a>
                </div>
                <div>
                    <a href="{{ route('workers.edit', $worker->id) }}">Редактировать</a>
                </div>
                <div>
                    <form action="{{ route('workers.destroy', $worker->id) }}" method="Post">
                        @csrf
                        @method('Delete')
                        <input type="submit" value="Удалить">
                    </form>
                </div>
            </div>
        @endforeach
        <hr>
        <div class="navigate">
            {{ $workers->links() }}
        </div>
    </div>
    <style>
        .navigate svg {
            width: 20px;
        }
        .navigate {
            margin-top: 2%;
        }
    </style>
</body>
</html>
