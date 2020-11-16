@extends('layouts.app')

@section('content')

@foreach ($myArticles as $item)
<div class="row justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Article of  {{ App\Models\User::where('id', $item->user_id)->first()->name}}
                                        created at {{$item->created_at}}</div>

                    <div class="card-body">



                        {{$item->body}} <br>

                    </div>

                    <div class="card-body">
                       <hr width="fill" color="green"></hr>

                        @foreach ($comments as $comment)
                        @if ( $comment->article_id==$item->id)
                        {{ App\Models\User::where('id', $comment->user_id)->first()->name}}:


                        {{$comment->body}}&emsp;&emsp;&emsp;&emsp;Date:{{ App\Models\Comments::where('id', $comment->id)->first()->created_at}}
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

