@extends('dashboard.master')

@section('content')
<div class="row">
    <div class="col">
        <form action="{{route("category.update", $category->id)}}" method="POST">
            @method('PUT')
            @include('dashboard.category._form')
            <button type="submit" class="btn btn-outline-success">Actualizar</button>
        </form>
    </div>
</div>
@endsection
