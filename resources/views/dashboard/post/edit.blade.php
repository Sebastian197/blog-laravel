@extends('dashboard.master')

@section('content')
<div class="row">
    <div class="col">
        <form action="{{route("post.update", $post->id)}}" method="POST">
            @method('PUT')
            @include('dashboard.post._form')
            <button type="submit" class="btn btn-outline-success">Actualizar</button>
        </form>
    </div>
</div>

<form action="{{route("post.image", $post)}}" method="POST" enctype="multipart/form-data" class="mt-3">
    @csrf
    <div class="row align-items-center">
        <div class="col">
            <input type="file" class="form-control @error('image') is-invalid @enderror"" name="image" value="" id="imagen" aria-describedby="helpImage" />
            @error('image') <small id="helpImage" class="text-danger">{{$message}}</small> @enderror
        </div>
        <div class="col">
            <button type="submit" class="btn btn-success">Subir imagen</button>
        </div>
    </div>
</form>
@endsection
