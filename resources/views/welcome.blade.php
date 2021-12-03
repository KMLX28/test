@extends('app-layout')

@section('content')
    <a href="{{ route('websites.index') }}">websites</a>
    <a href="{{ route('posts.create') }}">Create A Post</a>
@endsection
