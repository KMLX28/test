@extends('app-layout')

@section('content')
    <form method="post" action="{{route('subscribe.store')}}">
        <h3>{{$website->name}}</h3>
        <h4>{{$website->description}}</h4>
        @csrf
        <label for="email">email</label>
        <input type="text" name="email" required>
        <input type="hidden" name="website_id" value="{{$website->id}}">
        <button type="submit">Subscribe</button>
    </form>
@endsection

