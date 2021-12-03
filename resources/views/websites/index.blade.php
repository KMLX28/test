@extends('app-layout')

@section('content')
    <ul>
        @foreach($websites as $website)
            <a href="{{route('websites.show', $website)}}">
                <li>{{$website->name}}</li>
            </a>
        @endforeach
    </ul>
@endsection


