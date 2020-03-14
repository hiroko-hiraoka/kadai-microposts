@extends('layouts.app')

@section('content')
    <div class="text-center text-info ">
        <h1>メンバー登録</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-2">
            
            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'ニックネーム') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード確認') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('登　録', ['class' => 'btn btn-success btn-block']) !!}
            {!! Form::close() !!}
        </div>
        <aside="col-sm-4">
            
            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'アイコン入れるフォーム作りたい') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
               
                </div>
                
            
                {!! Form::submit('アイコン登録', ['class' => 'btn btn-success btn-block']) !!}
            {!! Form::close() !!}
        </aside>
    </div>
@endsection

