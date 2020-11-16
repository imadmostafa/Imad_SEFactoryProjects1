<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    //

 public function __construct()
 {

 }

    public function index(){
        return view('home',[
          'Articles'=>Article::all(),
          'comments'=>DB::select("select * from comments ")
        ]

        );
    }



    public function selfindex(){
        $current_id=Auth::id();
return view('myArticles',[

 'myArticles'=>DB::select("select * from articles where user_id='$current_id'"),
//'comments'=>DB::select("select * from comments where user_id='$current_id' AND article_id=1"),
'comments'=>DB::select("select * from comments ")
//'myArticles'=>DB::select("SELECT a.*,c.body as comments_body from articles as a LEFT JOIN comments as c ON a.id=c.article_id Group by a.id")
]);
}


//SELECT a.*,c.body as comments_body from articles as a LEFT JOIN comments as c ON a.id=c.article_id
// /SELECT a.*,c.body as comments_body from articles as a LEFT JOIN comments as c ON a.id=c.article_id GROUP by id



public function create(){
$body_article=$_POST['body_article'];
//die($body_article);
$current_id=Auth::id();
$article_object=new Article();
$article_object->add_article($body_article,$current_id);

return redirect('myArticles');
//cole function create in article model passing ot it the variables entered in form
//then redirect to view
}




public function show_insertForm(){
return view ('addArticle');
}



public function delete(){
$article_id=request('article_id');
$article_object=new Article();
$article_object->delete_article($article_id);

return redirect('myArticles');

}



public function article_user(){
    $article_object=new Article();
    $article_user_id=request('article_id');
    $article_userr=$article_object->article_user($article_user_id);

    die($article_userr);


}





}

