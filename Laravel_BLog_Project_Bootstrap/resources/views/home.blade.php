@extends('layouts.app')

@section('content')

<style>
    .card-header{
        color: green
    }
    .card-body{
       color:blue
    }
    </style>
@foreach ($Articles as $item)
<div class="row justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Article of  {{$item->user_id}}
                    {{App\Models\User::where('id', $item->user_id)->first()->name}}
                    </div>

                    <div class="card-body" id={{$item->id}}>



                        {{$item->body}} <br>





                    </div>

                    <div class="card-body" id='comments'>
                        <hr width="fill" color="green"></hr>




                        <a href="/like_article/{{$item->id}}" class="like-button" id="btn222{{$item->id}}">
                            <i class="material-icons is-liked bouncy">favorite</i>


                            <span class="like-overlay"></span>
                        @foreach ($likes as $like)

                        @if ( $like->article_id==$item->id)






                             {{$like->sumoflikes}}




                        @endif
                        @endforeach
                    </a>
                    <br>
                        @foreach ($comments as $comment)
                        @if ( $comment->article_id==$item->id)
                        <tr>
                         {{ App\Models\User::where('id', $comment->user_id)->first()->name}}:


                        {{$comment->body}}&emsp;&emsp;&emsp;&emsp;Date:{{ App\Models\Comments::where('id', $comment->id)->first()->created_at}}
                        </tr>
                        <br>
                        @endif
                        @endforeach



                        <form method="post" action="/add_comment/{{$item->id}}">
                            @csrf


                            <input type=text
                                name="comment_body"
                                placeholder="Add your comment "

                            >



                            <footer class="flex justify-between items-center">


                                <button
                                    type="submit"
                                >
                                    Add Comment
                                </button>
                            </footer>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<br>
<br>

@endforeach









@endsection

