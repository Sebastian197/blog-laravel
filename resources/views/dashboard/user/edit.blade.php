@extends('dashboard.master')

@section('content')
<div class="row">
    <div class="col">
        <form action="{{route("user.update", $user->id)}}" method="POST">
            @method('PUT')
            @include('dashboard.user._form', ['pasw' => false])
            <button type="submit" class="btn btn-outline-success">Actualizar</button>
        </form>
    </div>
</div>
@endsection
