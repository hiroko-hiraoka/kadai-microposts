@extends('layouts.app')

@section('content')
    <div class="text-center text-info">
        <h1>おすすめの一品　投稿ページ</h1>
    </div>

    <div class="row">
        <div class="col-sm-8">
            {!! Form::open(['route' => 'microposts.store']) !!}
            
                <div class="form-groupe form-inline mt-3">
                    {!! Form::label('maker title', 'メーカー:') !!}
                    {!! Form::text('maker','', ['class' => 'form-control']) !!}
                </div>
            
                <div class="form-groupe form-inline mt-3 ml-3">
                    {!! Form::label('title', '商品名:') !!}
                    {!! Form::text('title', '', ['class' => 'form-control']) !!}
                </div>
            
                <div class="form-groupe form-inline mt-3 ml-4">
                    {!! Form::label('field', '分野:') !!}
                    {!! Form::text('field','', ['class' => 'form-control','cols' => '40']) !!}
                </div>
            
                <div class="form-groupe form-inline mt-3 ml-4">
                    {!! Form::label('class', '分類:') !!}
                    {!! Form::text('class', '', ['class' => 'form-control','cols' => '40']) !!}
                </div>
            
                <div class="form-groupe form-inline mt-3">
                    {!! Form::label('content', 'コメント:') !!}
                {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '6']) !!}
                </div>
            
            <div class="mt-5">
                 {!! Form::submit('投稿する', ['class' => 'btn btn-success btn-block']) !!}
            {!! Form::close() !!}
            </div>
        </div>
        <aside class="col-sm-4">
            //写真投稿
        </aside>
    </div>
@endsection