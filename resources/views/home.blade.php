{{-- <x-todo>
    @foreach ($tasks as $task)
        <h3>{{$task['name']}}</h3>
    @endforeach
</x-todo> --}}

@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
@endsection