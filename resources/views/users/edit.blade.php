@extends('layouts.app')

@section('content')


    <div class="text-center text-info ">
        <h1>登録情報　変更</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-2">
            @if ($user = \Auth::user())    
            {!! Form::model($user,  ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', '新ニックネーム') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('email', '新メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password', '新パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password_confirmation', '新パスワード確認') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('登録情報 変更する', ['class' => 'btn btn-success btn-block']) !!}
            {!! Form::close() !!}
            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                {!! Form::submit('登録情報　消去する', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
            @else
                return back
            @endif                
            
        </div>
        <aside="col-sm-4">
            
            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'アイコン入れるフォーム作りたい') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
               
                </div>
          
        </aside>
    </div>
@endsection

