<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post as PostEloquent;
use App\PostType as PostTypeEloquent;

use \Carbon\Carbon as Carbon;

use Auth;
use View;

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
}
