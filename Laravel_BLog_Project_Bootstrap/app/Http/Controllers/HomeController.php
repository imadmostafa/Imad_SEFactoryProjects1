<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LikesController;
use Illuminate\Support\Facades\DB;
use App\Models\Likes;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $likes_object=new Likes();
        $likes=$likes_object->numberof_likes();

        return view('home',[
            'Articles'=>Article::all(),
            'comments'=>DB::select("select * from comments "),
            'likes'=>$likes,

        ]);
    }
}
//'likes'=>DB::table('likes')->select(DB::raw(" article_id,SUM(Liked) as sumoflikes"))->groupBy('article_id')->get()
