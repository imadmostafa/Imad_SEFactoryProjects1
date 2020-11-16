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
                    <div class="card-header">Article of  {{$item->user_id}}</div>

                    <div class="card-body">



                        {{$item->body}} <br>

                    </div>

                    <div class="card-body">
                        <hr></hr>


                        @foreach ($comments as $comment)
                        @if ( $comment->article_id==$item->id)
                        *{{$comment->body}}
                          FROM {{$comment->user_id}}
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

