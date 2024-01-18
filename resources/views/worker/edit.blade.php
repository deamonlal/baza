@extends('layout.main')
@section('page_name')
    Edit page
@endsection
@section('content')
    <div>
        <a href="{{ route('workers.index') }}">Вернуться назад</a>
    </div>
    <div>
        <hr>
        <div>
            <form action="{{ route('workers.update', $worker->id) }}" method="Post">
                @csrf
                @method('Patch')
                <div style="margin-bottom: 15px;">
                    <input type="text" name="name" value="{{ old('name') ?? $worker->name }}" placeholder="Имя">
                    @error('name')<div>{{ $message }}</div>@enderror
                </div>
                <div style="margin-bottom: 15px;">
                    <input type="text" name="surname" value="{{ old('surname') ?? $worker->surname }}" placeholder="Фамилия">
                    @error('surname')<div>{{ $message }}</div>@enderror
                </div>
                <div style="margin-bottom: 15px;">
                    <input type="email" name="email" value="{{ old('email') ?? $worker->email }}" placeholder="Емейл">
                    @error('email')<div>{{ $message }}</div>@enderror
                </div>
                <div style="margin-bottom: 15px;">
                    <input type="number" name="age" value="{{ old('age') ?? $worker->age }}" placeholder="Возраст">
                </div>
                <textarea name="description" placeholder="Описание">{{ old('description') ?? $worker->description }}</textarea>
                <div style="margin-bottom: 15px;">
                    <input id="married" type="checkbox" name="is_married" {{ (old('is_married') ?? $worker->is_married) ? 'checked' : '' }}>
                    <label for="married">Женат(а)</label>
                </div>
                <div style="margin-bottom: 15px;">
                    <input type="submit" value="Сохранить">
                </div>
            </form>
        </div>
    </div>
@endsection

