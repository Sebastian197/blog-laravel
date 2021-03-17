@extends('dashboard.master')

@section('content')
<div class="row">
    <div class="col">
        <form action="{{route("tag.update", $tag->id)}}" method="POST">
            @method('PUT')
            @include('dashboard.tag._form')
            <button type="submit" class="btn btn-outline-success">Actualizar</button>
        </form>
    </div>
</div>

@endsection
