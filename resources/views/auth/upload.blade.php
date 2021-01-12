@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif

                <div class="input-group">
                    <form action="/upload" method="post">
                        {{ csrf_field() }}
                        <h2>タイトル</h2>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input class="text form-control" type="text" name="title" value="{{old('title')}}">
                        <h2>コンテンツ</h2>
                        <textarea class=" form-control" type="text" name="comment" value="">{{old('comment')}}</textarea>
                        <input class="btn bg-primary" type="submit" name="send" value="投稿">
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
