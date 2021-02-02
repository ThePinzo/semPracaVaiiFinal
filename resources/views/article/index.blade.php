@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Huby') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>

                        @endif
                        @auth
                            <div class="mb-3">
                                <a href="{{route('article.create')}}" class="btn btn-success" role="button">Add new
                                    article</a>
                            </div>
                        @endauth


{{--                            @foreach($articles as $article)--}}
{{--                            <header></header>--}}
{{--                            <p><?$article->?></p>--}}
{{--                            @endforeach--}}
                            {!!  $grid->show() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
