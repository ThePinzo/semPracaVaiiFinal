@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>

                        @endif
                        @if(Auth::user()->email == 'admin@admin.admin')
                            {!!  $grid->show() !!}
                        @else
                            <div class="card-header">{{ __('Access forbidden') }}</div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
