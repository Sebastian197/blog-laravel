@extends('dashboard.master')

@section('content')
<div class="row">
    <div class="col">
        <form action="{{route("tag.store")}}" method="POST">
            @include('dashboard.tag._form')
            <button type="submit" class="btn btn-outline-primary">Crear tag</button>
        </form>
    </div>
</div>
@endsection
