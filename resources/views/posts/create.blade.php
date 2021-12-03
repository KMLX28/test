@extends('app-layout')

@section('content')
    <form method="post" action="{{route('posts.store')}}">
        @csrf
        <div>
            <select style="margin-bottom: 10px" name="website_id">
                @foreach($websites as $website)
                    <option value="{{$website->id}}">{{$website->name}}</option>
                @endforeach
            </select>
            <br>
            <label for="title">title</label>
            <input type="text" name="title" required>
            <br>
            <textarea required style="margin-top: 10px" placeholder="body..." name="body" id="" cols="30" rows="10"></textarea>
            <button style="display: block; margin-top: 10px;" type="submit">Post</button>

        </div>
    </form>
@endsection

