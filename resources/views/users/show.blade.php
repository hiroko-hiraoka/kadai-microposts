@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
            {!! link_to_route('users.edit', '登録情報変更', ['id' => $user->id], ['class' => 'btn btn-block btn-success']) !!}
              <form action="{{ action('PhotosController@create') }}" method="post" enctype="multipart/form-data">
                <!-- アップロードフォームの作成 -->
                <input type="file" name="image">
                {{ csrf_field() }}
                <input type="submit" value="アップロード">
              </form>
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
            @if (count($microposts) >0)
                @include('microposts.microposts', ['microposts' => $microposts])
            @endif
        </div>
    </div>
    
@endsection

