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
                        <tr>

                            <th class="author">投稿者：{{$item->getUser()}}</th>
                            @if($item->getData() === Auth::id())
                            <td>
                                <form action="/board/{{$item->id}}" method="get">
                                    {{ csrf_field() }}
                                    <input class="btn bg-primary " type="submit" name="edit" value="編集">
                                </form>
                            </td>
                            <td class="delete">
                                <form action="/board/{{$item->id}}" method="post">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}
                                    <input class="btn remove" type="submit" name="delete" value="削除">
                                </form>
                            </td>
                            @endif
                        </tr>
                    </table>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
