<ul class="media-list">
    @foreach ($microposts as $micropost)
        <li class="media mb-3">
            <img class="mr-1 rounded" src="{{ $micropost->image_path }}" width=200 alt="写真投稿は詳細画面から">
            <div class="media-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="d-flex">
                            <p class="mb-0 mr-2">{!! $micropost->field !!}</p>
                            <p class="mb-0 mr-2">{!! $micropost->class !!}</p>
                            <p>{!! link_to_route('users.show', $micropost->user->name, ['id' => $micropost->user->id]) !!} <span class="text-muted">投稿日時 {{ $micropost->created_at }}</span></p>
                        </div>
                        <h5 class="d-flex">
                            <p class="mb-0 mr-3">{!! $micropost->maker !!}</p>
                            <p class="mb-0 text-dark">{!! link_to_route('microposts.show', $micropost->title, ['id' => $micropost->id]) !!}</p>
                        </h5>
                    </div>
                    <div class="col-sm-6 border border-success rounded" style="padding:10px;">
                        <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div>
                             @include('user_favorite.favorite_button')
                        </div>
                        <div>
                            @if (Auth::id() === $micropost->user_id)
                                {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                </div>     
           </div>
    </li>
    @endforeach
</ul>
{{ $microposts->links('pagination::bootstrap-4') }}

