@extends('dashboard.master')

@section('content')
<div class="row">
    <div class="col">
    @csrf
        <div class="form-group">
            <label for="title">Título del tag</label>
            <input readonly type="text" name="title" id="title" class="form-control" value="{{$tag->title}}">
        </div>

    </div>
</div>
@endsection
