@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-3">
            <div class="media-body">
                <ul class="media-list">
                    <li class="media mb-3">
                        <img class="mr-1 rounded" src="{{ Gravatar::src($micropost->user->email, 200) }}" alt="">
                    </li>
                </ul>
            </div>
        </aside>
        <div class="col-sm-9">
            <p class="text-muted text-right">{{ $micropost->created_at }}</p>
            <div class="d-flex">
                <h5 class="mt-3 mr-3">{!! $micropost->id !!}</h6>
                <h5 class="mt-3 mr-3 bg-success rounded">{!! $micropost->maker !!}</h5> 
                <h3 class="mt-3 mr-3 text-white bg-success rounded">{!! $micropost->title !!}</h3> 
                <h5 class="mt-3 mr-3 bg-success rounded">{!! $micropost->field !!}</h5>
                <h5 class="mt-3 mr-3 bg-success rounded">{!! $micropost->class !!}</h5>
                <h5  class="mt-3 mr-3 bg-success rounded text-light">{!! link_to_route('users.show', $micropost->user->name, ['id' => $micropost->user->id]) !!}</h5>
            </div>
            <div class="border border-success rounded padding:10px mb-3" >
                <p class="mb-0 inline-box">{!! nl2br(e($micropost->content)) !!}</p>
            </div>
            @if (Auth::id() === $micropost->user_id)
            　  <div class="d-flex">
                    <div class="mr-4">
                        {!! link_to_route('microposts.edit', 'この投稿を編集する', ['id' => $micropost->id], ['class' => 'btn btn-success']) !!}
                    </div>
                    <div class="mr-4">
                        {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                        {!! Form::submit('この投稿を削除する', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="text-light bg-success">写真を追加する</div>
                        <form action="{{ action('PhotosController@create2', [$micropost->id]) }}" method="post" enctype="multipart/form-data">
                            <!-- アップロードフォームの作成 -->
                            <input type="file" name="image">
                            {{ csrf_field() }}
                            <input type="submit" value="アップロード">
                        </form>
                    </div>
                </div>
            @endif
        </div>
   
    </div>

@endsection