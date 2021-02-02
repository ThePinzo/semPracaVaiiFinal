@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($gallery as $gallery)
                <div class="col-12">
                    <div class="card kartaGaleria">
                        <div class="card-body">


                            <img class="card-img" src="{{$gallery['path']}}" alt="image">


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
