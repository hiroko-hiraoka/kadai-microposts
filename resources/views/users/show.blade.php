@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-2">
            @include('users.card', ['user' => $user])
            <div class="text-center mt-2">
                @if($user->icon == null )
                    <div class="text-light bg-success">アイコンの登録</div>
                    <form action="{{ action('PhotosController@create') }}" method="post" enctype="multipart/form-data">
                        <!-- アップロードフォームの作成 -->
                        <input type="file" name="image">
                        {{ csrf_field() }}
                        <input type="submit" value="アップロード">
                    </form>
                @endif
            </div>
            
            {!! link_to_route('users.edit', '登録情報変更', ['id' => $user->id], ['class' => 'btn btn-block btn-success mt-2']) !!}
        </aside>
        <div class="col-sm-10">
            @include('users.navtabs', ['user' => $user])
            @if (count($microposts) >0)
                @include('microposts.microposts', ['microposts' => $microposts])
            @endif
        </div>
    </div>
    
@endsection

