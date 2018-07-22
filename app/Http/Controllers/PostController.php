<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post as PostEloquent;
use App\PostType as PostTypeEloquent;

use App\Http\Requests\PostRequest;

use \Carbon\Carbon as Carbon;

use Auth;
use View;
use Redirect;
class PostController extends Controller
{
    //
   /* public function __construct()
    {
          $this->middleware('auth',['expect'=>['index','show']]);
    }*/
    public function index()
    {
        $posts=PostEloquent::orderBy('create_at','DESC')->paginate(5);
        $post_types=PostTypeEloquent::orderBy('name','ASC')->get();
        return View::make('post.index',['posts'=>$posts,'post_types'=>$post_types]);
    }
    public function create(){
        $post_types=PostTypeEloquent::orderBy('name','ASC')->get();
        return View::make('post.create',['post_types'=>$post_types]);
    }
    public function store(PostRequest $request){
         $post=new PostEloquent($request->all());
         $post->user_id=Auth::user()->id;
         $post->save();
         return Redirect::route('post.index');
    }
    public function show($id){
     $post=PostEloquent::findOrFail($id);
     return View::make('post.show',['post'=>$post]);
    }
    public function edit(){

    }
    public function update(){

    }
    public function destory(){

    }
}
