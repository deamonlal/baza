@extends('layout.main')

@section('page_name')
    Create page
@endsection
@section('content')
    <div>
        <a href="{{ route('workers.index') }}">Вернуться назад</a>
    </div>
    <div>
        <hr>
        <div>
            <form action="{{ route('workers.store') }}" method="Post">
                @csrf
                <div style="margin-bottom: 15px;">
                    <input type="text" name="name" placeholder="Имя" value="{{ old('name') }}">
                    @error('name')<div>{{ $message }}</div>@enderror
                </div>
                <div style="margin-bottom: 15px;">
                    <input type="text" name="surname" placeholder="Фамилия" value="{{ old('surname') }}">
                    @error('surname')<div>{{ $message }}</div>@enderror
                </div>
                <div style="margin-bottom: 15px;">
                    <input type="email" name="email" placeholder="Емейл" value="{{ old('email') }}">
                    @error('email')<div>{{ $message }}</div>@enderror
                </div>
                <div style="margin-bottom: 15px;">
                    <input type="number" name="age" placeholder="Возраст" value="{{ old('age') }}">
                </div>
                <textarea name="description" placeholder="Описание" > {{ old('description') }} </textarea>
                <div style="margin-bottom: 15px;">
                    <input id="married" type="checkbox" name="is_married" {{ old('is_married') == 'on' ? 'checked' : '' }}>
                    <label for="married">Женат(а)</label>
                </div>
                <div style="margin-bottom: 15px;"><input type="submit" value="Добавить"></div>
            </form>
        </div>
    </div>
@endsection
