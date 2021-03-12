@extends('dashboard.master')

@section('content')
<div class="row">
    <div class="col">
    @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input readonly type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="surname">Apellido</label>
            <input readonly type="text" name="surname" id="surname" class="form-control" value="{{$user->surname}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input readonly type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <input readonly type="rol" name="rol" id="rol" class="form-control" value="{{$user->rol->key}}">
        </div>
    </div>
</div>
@endsection
