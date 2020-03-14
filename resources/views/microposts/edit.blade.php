
@extends('layouts.app')

@section('content')
    <div class="text-center text-info">
        <h1>投稿内容 変更ページ ID:{{ $micropost->id }}</h1>
    </div>

    <div class="row">
        <div class="col-sm-8">
            {!! Form::model($micropost, ['route' => ['microposts.update', $micropost->id], 'method' => 'put']) !!}
            
                <div class="form-groupe form-inline mt-3">
                    {!! Form::label('maker title', 'メーカー:') !!}
                    {!! Form::text('maker', null, ['class' => 'form-control']) !!}
                </div>
            
                <div class="form-groupe form-inline mt-3 ml-3">
                    {!! Form::label('title', '商品名:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
            
                <div class="form-groupe form-inline mt-3 ml-4">
                    {!! Form::label('field', '分野:') !!}
                    {!! Form::text('field', null, ['class' => 'form-control','cols' => '40']) !!}
                </div>
            
                <div class="form-groupe form-inline mt-3 ml-4">
                    {!! Form::label('class', '分類:') !!}
                    {!! Form::text('class', null, ['class' => 'form-control','cols' => '40']) !!}
                </div>
            
                <div class="form-groupe form-inline mt-3">
                    {!! Form::label('content', 'コメント:') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '6']) !!}
                </div>
            
            <div class="mt-5">
                 {!! Form::submit('変更する', ['class' => 'btn btn-success btn-block']) !!}
            {!! Form::close() !!}
            </div>
        </div>
        <aside class="col-sm-4">
            //写真投稿
        </aside>
    </div>
@endsection