<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;


    public function add_comment($body_comment,$article_id,$current_id){
        $Comment_Object=new Comments();
        DB::table('comments')->insert(['body'=>$body_comment,'article_id'=>$article_id,'user_id'=>$current_id,'created_at'=>DB::raw('now()')]);

     }

}
