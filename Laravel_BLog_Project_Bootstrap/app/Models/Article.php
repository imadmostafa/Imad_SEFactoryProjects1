<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Article extends Model
{
    use HasFactory;
    protected $fillable = ['body'];//to allow for mass assignment in update method
    public function add_article($body_article,$current_id){
       $Article_object=new Article();
       DB::table('articles')->insert(['body'=>$body_article,'user_id'=>$current_id,'created_at'=>DB::raw('now()')]);

    }


public function delete_article($article_id){
    DB::table('articles')->where('id',$article_id)->delete();
}





public function article_user($user_id)
{

$article_user =User::where('id', $user_id)->first();

return $article_user->name;

}
public function update_article($body_article,$article_id){//used built in eloquent methods in article controller
    //but tried both techniques first
    DB::table('articles')->update
    (
        ['id'=>$article_id,'user_id'=>Auth::id()],
        ['body'=>$body_article]
    );

}


}
