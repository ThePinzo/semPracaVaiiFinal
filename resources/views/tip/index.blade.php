@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($tip as $tip)
                <div class="col-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{$tip['title']}}</h5>
                            <p class="card-text">{{$tip['text']}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
