@foreach ($microposts as $micropost)
    <div class="row">
        <div class="col-sm-2 mt-3">
            @if($micropost->image_path == null )
                <img class="mr-2 rounded" src="{{ Gravatar::src($micropost->user->email, 150) }}" alt="">
            @else   
                <img class="mr-1 rounded" src="{{ $micropost->image_path }}" width=150 alt="写真投稿は詳細画面から">
            @endif
        </div>    
        <div class="col-sm-5 mt-2">
            <p class="text-end">投稿者：{!! link_to_route('users.show', $micropost->user->name, ['id' => $micropost->user->id]) !!} <span class="text-muted">投稿日時 {{ $micropost->created_at }}</span></p>
            <h5>商品名：{!! link_to_route('microposts.show', $micropost->title, ['id' => $micropost->id]) !!}</h5>
            <h6 >メーカー：{!! $micropost->maker !!}</p>
            <p class="mb-0 mr-2">分野：{!! $micropost->field !!}</p>
            <p class="mb-0 mr-2">分類：{!! $micropost->class !!}</p>
        </div>
        <div class="col-sm-4 border border-success rounded" style="padding:10px;">
            <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
        </div>
        <div class="col-sm-1　mt-3">
            <div>
                @include('user_favorite.favorite_button')
            </div>
        </div>
        <div>
            @if (Auth::id() === $micropost->user_id)
                {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </div>

@endforeach

{{ $microposts->links('pagination::bootstrap-4') }}

