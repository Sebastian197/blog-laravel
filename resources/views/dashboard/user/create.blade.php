@extends('dashboard.master')

@section('content')
<div class="row">
    <div class="col">
        <form action="{{route("user.store")}}" method="POST">
            @include('dashboard.user._form', ['pasw' => true])
            <button type="submit" class="btn btn-outline-primary">Crear</button>
        </form>
    </div>
</div>
@endsection
