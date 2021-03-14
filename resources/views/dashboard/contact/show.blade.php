@extends('dashboard.master')

@section('content')
<div class="row">
    <div class="col">
    @csrf
        <div class="form-group">
            <label for="title">Nombre</label>
            <input readonly type="text" class="form-control" value="{{$contact->name}}">
        </div>
        <div class="form-group">
            <label for="url_clean">Apellidos</label>
            <input readonly type="text" class="form-control" value="{{$contact->surname}}">
        </div>
        <div class="form-group">
            <label for="url_clean">Email</label>
            <input readonly type="text" class="form-control" value="{{$contact->email}}">
        </div>
        <div class="form-group">
            <label for="content">Introduce el contenido del contact</label>
            <textarea readonly class="form-control" rows="3">{{$contact->message}}</textarea>
        </div>
    </div>
</div>
@endsection
