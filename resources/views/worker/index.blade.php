@extends('layout.main')

@section('page_name')
Index page - workers
@endsection
@section('content')
<div>
    <a href="{{ route('workers.create') }}">Создать worker'а</a>
</div>
<hr>
<div>
    <form action=" {{ route('workers.index') }}">
        <input type="text" name="name" placeholder="name" value="{{ request()->get('name') }}">
        <input type="text" name="surname" placeholder="surname" value="{{ request()->get('surname') }}">
        <input type="text" name="email" placeholder="email" value="{{ request()->get('email') }}">
        <input type="number" name="from" placeholder="from" value="{{ request()->get('from') }}">
        <input type="number" name="to" placeholder="to" value="{{ request()->get('to') }}">
        <input type="text" name="description" placeholder="description" value="{{ request()->get('description') }}">
        <input id="is_married" type="checkbox" name="is_married" {{ request()->get('is_married') ? 'checked' : '' }}>
        <label for="is_married">Женат(а)</label>
        <input type="submit" value="Показать">
        <a href="{{ route('workers.index') }}">Сбросить</a>
    </form>
</div>
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
        {{ $workers->withQueryString()->links() }}
    </div>
</div>
@endsection
