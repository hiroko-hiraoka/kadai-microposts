@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="text-center my-4">
                <h3 class="brown border p-2">おすすめ検索</h3>
            </div>
            {!! Form::open(['route' => 'search', 'method' => 'get']) !!}
                <div class="form-group">
                    {!! Form::label('maker', 'メーカー:') !!}
                    {!! Form::text('maker' ,'', ['class' => 'form-control', 'placeholder' => '指定なし'] ) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('title', '商品名:') !!}
                    {!! Form::text('mtitle' ,'', ['class' => 'form-control', 'placeholder' => '指定なし'] ) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('field', '分野:') !!}
                    {!! Form::text('field' ,'', ['class' => 'form-control', 'placeholder' => '指定なし'] ) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('class', '分類:') !!}
                    {!! Form::text('class' ,'', ['class' => 'form-control', 'placeholder' => '指定なし'] ) !!}
                </div>
                {!! Form::submit('検索', ['class' => 'btn btn-info btn-block']) !!}
            {!! Form::close() !!}
        </div>
        <div class="col-sm-8">
            <div class="text-center my-4">
                <h3 class="brown p-2">検索結果一覧</h3>
            </div>
            <div class="container">
                <!--検索ボタンが押された時に表示されます-->
                @if(!empty($data))
                    <div class="my-2 p-0">
                        <div class="row  border-bottom text-center">
                            <div class="col-sm-4">
                                <p>メーカー</p>
                            </div>
                            <div class="col-sm-4">
                                <p>商品名</p>
                            </div>
                            <div class="col-sm-2">
                                <p>分野</p>
                            </div>
                            <div class="col-sm-2">
                                <p>分類</p>
                            </div>                            
                        </div>
　　　　　　　　　　　　　　//検索条件に一致したユーザを表示します
                        @foreach($micropost as $data)
                              @include('microposts.microposts', ['microposts' => $microposts])
                        @endforeach
                    </div>
                    {{ $data->appends(request()->input())->render('pagination::bootstrap-4') }}
                @endif
            </div>
        </div>
    </div>
@endsection



   </div>
            <div style="padding:20px 0; padding-left:0px;">
                <form class="form-inline" action="{{url('/serch')}}">
                    <div class="form-group">
                        <input type"text" name="keyword" value="{{$keyword}}" class="form-control" placeholder="メーカー">
                    </div>
                    <input type="submit" value="検索" class="btn btn-info">
                </form>
            </div>
             
            <div style="text-align:right;">
                <div class="paginate">
                      {{ $data->appends(Request::only('keyword'))->links() }}
                 </div>
            </div>
         </div>