<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LikesController extends Controller
{
    //



  public function index(){
   $likes_object=new Likes();
   $article_likes=$likes_object->numberof_likes();
 // $ss= DB::table('likes')->select(DB::raw(" article_id,SUM(Liked)"))->groupBy('article_id')->get();
 die($article_likes);
return $article_likes;

   //return $article_likes;

  }
public function update_like(){


$article_id=request('article_id');
$user_id=Auth::id();
$likes_object=new Likes();
$likes_object->update_like($article_id,$user_id);


    return redirect('/home');
}


}
