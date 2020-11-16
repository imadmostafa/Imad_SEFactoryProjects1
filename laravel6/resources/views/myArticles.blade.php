@extends('layouts.app')

@section('content')

@foreach ($myArticles as $item)
<div class="row justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Article of  {{$item->user_id}}
                                        created at {{$item->created_at}}</div>

                    <div class="card-body">



                        {{$item->body}} <br>

                    </div>

                    <div class="card-body">
                        Here the likes and comments forms will be
                        <br>
                        @foreach ($comments as $comment)
                        @if ( $comment->article_id==$item->id)
                        {{$comment->body}}
                        <br>
                        @endif
                        @endforeach


                    </div>
                </div>

                <form method="post" action="/deleteArticle/{{$item->id}}">
                    @csrf


                        <button
                            type="submit"
                           >
                            Delete Article
                        </button>

                </form>
            </div>

        </div>

    </div>

</div>


<br>
<br>
@endforeach


@endsection

