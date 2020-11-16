<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public function add_article($body_article,$current_id){
       $Article_object=new Article();
       DB::table('articles')->insert(['body'=>$body_article,'user_id'=>$current_id,'created_at'=>DB::raw('now()')]);

    }


public function delete_article($article_id){
    DB::table('articles')->where('id',$article_id)->delete();
}





public function article_user()
{




}




}
