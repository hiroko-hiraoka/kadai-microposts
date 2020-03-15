@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                @if($user->icon == null )
                    <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 50) }}" alt="">
                @else
                    <img class="rounded img-fluid" src="{{ $user->icon }}" width=50>
                @endif
                <div class="media-body">
                    <div>
                    {{ $user->name }}
                    </div>
                    <div>
                    <p>{!! link_to_route('users.show', 'プロフィール', ['id' => $user->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{ $users->links('pagination::bootstrap-4') }}
@endif

