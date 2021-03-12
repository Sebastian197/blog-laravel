@extends('dashboard.master')

@section('content')
<div class="row">
    <div class="col">
        <form action="{{route("post.store")}}" method="POST">
            @include('dashboard.post._form')
            <button type="submit" class="btn btn-outline-primary">Crear post</button>
        </form>
    </div>
</div>
@endsection
