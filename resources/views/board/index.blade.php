@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                @foreach($items as $item)
                <div class="card-body board-frame">
                    <table>
                        <tr>
                            <th class="user-title">{{$item->title}}</th>
                        </tr>
                        <tr>
                            <th class=" comment">{{$item->comment}}</th>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th class="author">投稿者：{{$item->getUser()}}</th>
                            @if($item->getData() === Auth::id())
                            <td>
                                <form action="/board/{{$item->id}}" method="get">
                                    @csrf
                                    <input class="btn bg-primary " type="submit" name="edit" value="編集">
                                </form>
                            </td>
                            <td class="delete">
                                <form action="/board/{{$item->id}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input class="btn remove" type="submit" name="delete" value="削除">
                                </form>
                            </td>
                            @endif
                            <th>
                                @if($item->users()->where('user_id', Auth::id())->exists())
                                <form action="/like/{{$item->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="&#9829" class="heart">
                                </form>
                                @else
                                <form action="/like/{{$item->id}}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="submit" value="&#9825" class="heart">
                                </form>
                                @endif
                            </th>
                            <td>
                                <p class="count">: {{$item->users()->count()}}</p>
                            </td>
                        </tr>
                    </table>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
