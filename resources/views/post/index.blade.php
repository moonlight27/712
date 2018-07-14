@extends('layouts.master')
@section('title','所有文章')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-8">
            <h4>
                @if(Auth::check())
                   <div class="float-right">
                       <a class="btn btn-light btn-sm" href="{{ route('post.create') }}" style="margin-left:20px;">
                           <span style="padding-left:5px;">新增文章</span>
                       </a>
                   </div>
                   @if(isset($keyword))
                   搜尋{{ $keyword }}
                   @else
                   所有文章
                   @endif
            </h4>
            <hr>
            @endif
            @if(count($posts)==0)
            <p class="text-center">
                沒有任何文章
            </p>
            @endif
            @foreach ($posts as $post)
                     <div class="card">
                         <div class="card-body">
                             <div class="container-fluid" style="padding:0;">
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
                                 <hr style="margin:10px 0;">
                                 <div class="row">
                                     <div class="col-md-12" style="height:100px;overflow:hidden;">
                                         {{ $post->content }}
                                     </div>
                                 </div>
                                 <div class="row" style="margin-top:10px;">
                                     <div class="col-md-8">
                                         @if(Auth::check())
                                         <form method="POST" action="#">
                                             <span style="padding-left:10px;">
                                                 <a class="btn btn-sm btn-primary" href="#">
                                                     <span style="padding-left:5px;"></span>
                                                 </a>
                                                 {{ csrf_field() }}
                                                 <input type="hidden" name="_method" value="DELETE">
                                                 <button class="btn btn-sm btn-danger" type="submit">
                                                     <span style="padding-left:5px;">刪除文章</span>
                                                 </button>
                                             </span>
                                         </form>
                                         @endif
                                         <div class="col-md-4">
                                             <a href="#" class="float-right">繼續閱讀...</a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         @endforeach
                     </div>
               </div>
               <div class="row">
                   <div class="col-xs-8">
                       @if(isset($keyword))
                   {{ $posts->appends(['keyword'=>$keyword])->render() }}
                       @else
                       {{ $posts->render() }}
                       @endif
                   </div>
               </div>
    </div>
    @endsection
