<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3>
    </div>
    <div class="card-body">
        @if($user->icon == null )
            <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
        @else
            <img class="rounded img-fluid" src="{{ $user->icon }}" width=200>
        @endif
    </div>
</div>
@include('user_follow.follow_button', ['user' => $user])