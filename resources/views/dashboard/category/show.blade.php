@extends('dashboard.master')

@section('content')
<div class="row">
    <div class="col">
    @csrf
        <div class="form-group">
            <label for="title">Título del post</label>
            <input readonly type="text" name="title" id="title" class="form-control" value="{{$category->title}}">
        </div>
        <div class="form-group">
            <label for="url_clean">URL_clean</label>
            <input readonly type="text" name="url_clean" id="url_clean" class="form-control" value="{{$category->url_clean}}">
        </div>
    </div>
</div>
@endsection
