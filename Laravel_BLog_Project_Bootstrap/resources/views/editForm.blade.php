@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Add Your Artilce Here </div>

                    <div class="card-body">

                        <div class="border border-green-600 rounded-lg px-12 py-12 mb-14">

                            <form method="post" action="/editArticle/{{$article_id}}">
                                @csrf


                                <textarea

                                  name="body_article"
                                  class="w-full"
                                  rows="4"
                                  cols="50">

                                    {{$body_article}}

                                    </textarea>




                                <footer class="flex justify-between items-center">


                                    <button
                                        type="submit"
                                        class="bg-dark-500 hover:bg-dark-600 rounded-lg shadow px-10 text-sm text-black h-10"
                                    >
                                        Publish Article
                                    </button>
                                </footer>
                            </form>



                        </div>



                    </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
