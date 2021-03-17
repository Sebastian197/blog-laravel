@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('post.index') }}">
                        <div class="d-flex">
                            <p>{{ __('Dashboard') }}</p>
                            <span class="material-icons md-48 ml-1">dashboard</span>
                        </div>
                    </a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{auth()->user()->name}}

                    {{ __(', You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
