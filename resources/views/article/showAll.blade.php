@extends('layouts.app')

@section('content')
    <div class="container" id="Article">
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <div class="mb-3">
                        @auth
                        <a href="{{route('article.create')}}" class="btn btn-success" role="button">Add new
                            article</a>
                        <hr>
                        @endauth
                    </div>

                    @foreach($articles as $article)
                        <h1 class="embed-responsive">{{$article['title']}}</h1>
                        <p>{{$article['text']}}</p>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
