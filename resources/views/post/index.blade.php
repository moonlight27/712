@extends('layouts.master')
@section('title','所有文章')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-8">
            <h4>
                @if(Auth::check())
                <div class="float-left">
                    <a class="btn btn-sm btn-primary" href="{{ route('post.create') }}" style="margin-left:20px;">
                        <span style="padding-left:5px;">新增文章</span>
                    </a>
                </div>
                @endif
                @if(isset($type))
                分類:{{ $type->name }}
                @if(Auth::check())
                <div class="float-right">
                    <form method="POST" action="{{ route('type.destory',['type'=>$type->id]) }}">
                        <span style="margin-left:10px;">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger">
                                <span style="padding-left:5px;">刪除分類</span>
                            </button>
                        </span>
                    </form>
                </div>
                <div class="float-right">
                    <a class="btn btn-sm btn-primary" href="{{ route('type.edit',['type'=>$type->id]) }}"style="margin-left:10px;">
                        <span style="padding-left:5px;">編輯分類</span>
                    </a>
                </div>
                @endif
                @elseif(isset($keyword))
                搜尋
                @else
                所有文章
                @endif
            </h4>
            <hr />
            @if(count($posts)==0)
            <p class="text-center">
                沒有任何文章
            </p>
            @endif
            @foreach($posts as $post)
            <div class="card">
                <div class="card-body">
                    <div class="container_field"style="padding:0;">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 style="margin-top:0;">{{ $post->title }}</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                @if($post->postType!=null)
                                <span class="badge" style="margin-left:10px;">{{ $post->postType->name }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 text-right">
                                {{ $post->created_at->toDateString() }}
                            </div>
                        </div>
                        <hr style="margin:10px 0;"/>
                        <div class="col-md-12"style="height:100px;overflow:hidden;">
                            {{ $post->content }}
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-md-8">
                            @if(Auth::check())
                            <form method="POST" action="{{ route('post.destroy',['post'=>$post->id]) }}">
                                <span style="padding-left:10px;">
                                    <a class="btn btn-sm btn-primary" href="{{ route('post.edit',['post'=>$post->id]) }}">
                                        <span style="padding-left:5px;">編輯文章</span>
                                    </a>
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <span style="padding-left:5px;">刪除文章</span>
                                    </button>
                                </span>
                            </form>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('post.show',['post'=>$post->id]) }}" class="float-right">繼續閱讀...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-sm-4">
        <div class="list-group">
            <a href="{{ route('post.index') }}" class="list-group-item{{ isset($type)?'':'active' }}">全部分類</a>
            @foreach($post_types as $post_type)
            <a href="{{ route('type.show',['type'=>$post_type->id]) }}"class="list-group-item{{ isset($type)?(($type->id==$post_type->id)?'active':''):'' }}">
                {{ $post_type->name }}
            </a>
            @endforeach
            @if(Auth::check())
            <a href="{{ route('type.create') }}" class="list-group-item">建立新分類</a>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-8">
        @if(isset($keyword))
        {{ $posts->appends(['keyword'=>$keyword])->render() }}
        @else
        {{ $posts->render() }}
        @endif
    </div>
</div>
@endsection

