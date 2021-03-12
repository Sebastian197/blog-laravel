@extends('dashboard.master')

@section('content')
<div class="row">
    <div class="col">
        <form action="{{route("category.store")}}" method="POST">
            @include('dashboard.category._form')
            <button type="submit" class="btn btn-outline-primary">Crear</button>
        </form>
    </div>
</div>
@endsection
