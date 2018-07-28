@extends('layouts.master')
@section('title','新文章')
@section('content')
<div class="container">
    <div class="row">
     <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                新文章
            </div>
            <div class="card-body">
                <div class="container-fluid" style="padding:0px;">
                    <form style="margin-top:20px;"  method="POST" action="{{ route('post.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="title" class="col-sm-2" style="font-size:20px;">標題</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-sm-2 col-form-label">分類</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="type" class="col-sm-2 col-form-label">
                                    @foreach($post_types as $post_type)
                                    <option value="{{ $post_type->id }}" >
                                        {{ $post_type->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-2 col-form-label">內文</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="10" name="content" style="resize:vertical;"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                           <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-sm btn-primary">儲存</button>
                           </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection

