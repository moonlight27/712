@extends('layouts.master')
@section('title',$post->title)
@section('content')
<div class="row">
    <div class="col-md-10 ">
        <div class="row">
         <div class="pb-2 mt-4 mb-2 border-bottom">
             <h1>
                 {{ $post->title }}
                 @if(Auth::check())
                 <div class="float-right">
                     <form method="POST" action="{{ route('post.destroy',['post'=>$post->id]) }}">
                         <span style="padding-left:10px;">
                             {{ csrf_field() }}
                             <input type="hidden" name="_method" value="DELETE">
                             <button type="submit" class="btn btn-sm btn-danger">
                                 <span style="padding-left:5px;">"刪除文章"</span>
                             </button>
                         </span>
                     </form>
                 </div>
                 <div class="float-right">
                     <a class="btn-sm btn-primary" href="{{ route('post.edit',['post'=>$post->id]) }}">
                         <span style="padding-left:5px;">編輯文章</span>
                     </a>
                 </div>
                 @endif
             </h1>
             <div class="row" style="padding-bottom:10px;">
                 <div class="col-sm-6">
                     @if($post->postType!=null)
                     <span class="badge" style="margin-left:10px;">{{ $post->postType->name }}</span>
                     @endif
                 </div>
                 <div class="col-sm-6 text-right">
                     {{ $post->created_at }}
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-sm-12">
                 {{ $post->content }}
             </div>
         </div>
        </div>
    </div>
</div>
@endsection
