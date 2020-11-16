<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function add_comment(){
        $body_comment=$_POST['comment_body'];
        $article_id=request('article_id');
        //die($body_article);
        $current_id=Auth::id();
        $comment_object=new Comments();
        $comment_object->add_comment($body_comment,$article_id,$current_id);

        return redirect('/home');
    }
}
