@csrf
<div class="form-group">
    <label for="title">Título del tag</label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="" aria-describedby="helpTitle" value="{{old('title', $tag->title)}}" />
    @error('title') <small id="helpTitle" class="text-danger">{{$message}}</small> @enderror
</div>
<input type="hidden" id="token" value={{csrf_token()}}>
