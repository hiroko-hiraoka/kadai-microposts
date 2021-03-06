@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <h1 class="text-center text-info">おすすめ一覧</h1>        
        <div>{{ $microposts->links('pagination::bootstrap-4') }}</div>

        <div class="row">
            <div class="col-sm-12">
                @if (count($microposts) > 0)
                    @include('microposts.microposts', ['microposts' => $microposts])
                @endif
            </div>
        </div>
            {!! link_to_route('microposts.create', 'おすすめの一品　投稿ページへ行く', [], ['class' => 'btn btn-block btn-success']) !!}
  
     
    @else
        <div class="center jumbotron">
            <h2 class="text-success font-weight-bold">おいでませ！</h2>
            <div class="text-center">
                <h1>おすすめの一品　紹介します</h1>
                    <div class="mt-4">{!! link_to_route('login', 'ロ グ イ ン', [], ['class' => 'btn btn-lg btn-success']) !!}</div>
                    <div class="mt-4">{!! link_to_route('signup.get', 'メンバー登録', [], ['class' => 'btn btn-lg btn-success']) !!}</div>
            </div>
        </div>
    @endif
@endsection