@csrf
<div class="form-group">
    <label for="title">Título del post</label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="" aria-describedby="helpTitle" value="{{old('title', $post->title)}}" />
    @error('title') <small id="helpTitle" class="text-danger">{{$message}}</small> @enderror
</div>
<div class="form-group">
    <label for="url_clean">URL_clean</label>
    <input type="text" name="url_clean" id="url_clean" class="form-control @error('url_clean') is-invalid @enderror" placeholder="" aria-describedby="helpUrlClean" value="{{old('url_clean', $post->url_clean)}}" />
    @error('url_clean') <small id="helpUrlClean" class="text-danger">{{$message}}</small> @enderror
</div>
<div class="form-group">
    <label for="category">Categorías</label>
    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category" aria-describedby="helpCategoryId">
        @foreach ($categories as $title => $id)
            <option {{$post->category_id === $id ? 'selected="selected"' : '' }} value="{{$id}}">{{$title}}</option>
        @endforeach
    </select>
    @error('category_id') <small id="helpCategoryId" class="text-danger">{{$message}}</small> @enderror
</div>
<div class="form-group">
    <label for="posted">Publicar</label>
    <select class="form-control @error('posted') is-invalid @enderror" name="posted" id="posted" aria-describedby="helpPosted">
        @include('dashboard.partials.option-yes-not',['val' => $post->posted])
    </select>
    @error('posted') <small id="helpPosted" class="text-danger">{{$message}}</small> @enderror
</div>
<div class="form-group">
    <label for="content">Introduce el contenido del post</label>
    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" placeholder="" aria-describedby="helpContent" rows="3">{{old('content', $post->content)}}</textarea>
    @error('content') <small id="helpContent" class="text-danger">{{$message}}</small> @enderror
</div>

<input type="hidden" id="token" value={{csrf_token()}}>
