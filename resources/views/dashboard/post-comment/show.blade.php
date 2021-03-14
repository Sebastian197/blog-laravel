@extends('dashboard.master')

@section('content')
<div class="row">
    <div class="col">
    @csrf
        <div class="form-group">
            <label for="title">Título del comentario</label>
            <input readonly type="text" class="form-control" value="{{$postComment->title}}">
        </div>
        <div class="form-group">
            <label for="url_clean">Usuario</label>
            <input readonly type="text" class="form-control" value="{{$postComment->user->name}}">
        </div>
        <div class="form-group">
            <label for="url_clean">Aprovado</label>
            <input readonly type="text" class="form-control" value="{{$postComment->approved}}">
        </div>
        <div class="form-group">
            <label for="content">Introduce el contenido del postComment</label>
            <textarea readonly class="form-control" rows="3">{{$postComment->message}}</textarea>
        </div>
    </div>
</div>
@endsection
