@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                @foreach($items as $item)
                <div class="card-body">
                    <table>
                        <tr>
                            <th>{{$item->title}}</th>
                        </tr>
                        <tr>
                            <th>{{$item->comment}}</th>
                        </tr>
                        <tr>

                            <th>投稿者：{{$item->getData()}}</th>
                            @if($item->getData() == Auth::user()->name)
                            <td>
                                <form action="/board/edit/{{$item->id}}" method="post">
                                    {{ csrf_field() }}
                                    <input class="btn bg-primary " type="submit" name="edit" value="編集">
                                </form>
                            </td>
                            <td class="delete">
                                <form action="/board/delete/{{$item->id}}" method="post">
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
