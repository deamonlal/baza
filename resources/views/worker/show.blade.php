@extends('layout.main')

@section('page_name')
    Show page - worker with id {{$worker->id}}
@endsection
@section('content')
    <div>
        <a href="{{ route('workers.index') }}">Вернуться назад</a>
    </div>
    <hr>
    <div>
        <div>Name: {{ $worker->name }}</div>
        <div>Surname: {{ $worker->surname }}</div>
        <div>Email: {{ $worker->email }}</div>
        <div>Age: {{ $worker->age }}</div>
        <div>Description: {{ $worker->description }}</div>
        <div>Is married: {{ $worker->is_married }}</div>
    </div>
@endsection
