<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Likes extends Model
{
    use HasFactory;
    public function numberof_likes(){
        $article_query= DB::table('likes')->select(DB::raw(" article_id,SUM(Liked) as sumoflikes"))->groupBy('article_id')->get();
    // die($article_query);
return $article_query;

    }



public function update_like($article_id,$user_id){
    $user_id=Auth::id();
$current_Liked=DB::table('likes')->where('article_id', $article_id)->where('user_id',$user_id)->first();
if($current_Liked!=null){
    $temp=$current_Liked->Liked;
}else{
    $temp=0;
}

if($temp==0){
    DB::table('likes')
    ->updateOrInsert(
        ['article_id' =>$article_id, 'user_id' =>$user_id],
        ['Liked' => '1']
    );
}else{
    DB::table('likes')
    ->updateOrInsert(
        ['article_id' =>$article_id, 'user_id' =>$user_id],
        ['Liked' => '0']
    );
}
}

public function insert_like($article_id,$user_id){



DB::table('likes')
    ->updateOrInsert(
        ['article_id' =>$article_id, 'user_id' =>$user_id],
        ['Liked' => '0']
    );


}








}
