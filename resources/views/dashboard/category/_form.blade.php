@csrf
<div class="form-group">
    <label for="title">Título de la categoría</label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="" aria-describedby="helpTitle" value="{{old('title', $category->title)}}" />
    @error('title') <small id="helpTitle" class="text-danger">{{$message}}</small> @enderror
</div>
<div class="form-group">
    <label for="url_clean">URL_clean</label>
    <input type="text" name="url_clean" id="url_clean" class="form-control @error('url_clean') is-invalid @enderror" placeholder="" aria-describedby="helpUrlClean" value="{{old('url_clean', $category->url_clean)}}" />
    @error('url_clean') <small id="helpUrlClean" class="text-danger">{{$message}}</small> @enderror
</div>
