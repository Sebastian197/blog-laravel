@csrf
<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="" aria-describedby="helpName" value="{{old('name', $user->name)}}" />
    @error('name') <small id="helpName" class="text-danger">{{$message}}</small> @enderror
</div>
<div class="form-group">
    <label for="surname">Apellido</label>
    <input type="text" name="surname" id="surname" class="form-control @error('surname') is-invalid @enderror" placeholder="" aria-describedby="helpSurname" value="{{old('surname', $user->surname)}}" />
    @error('surname') <small id="helpSurname" class="text-danger">{{$message}}</small> @enderror
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="" aria-describedby="helpEmail" value="{{old('email', $user->email)}}" />
    @error('email') <small id="helpEmail" class="text-danger">{{$message}}</small> @enderror
</div>
@if ($pasw)
     <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="" aria-describedby="helpPassword" value="{{old('password', $user->password)}}" />
        @error('password') <small id="helpPassword" class="text-danger">{{$message}}</small> @enderror
    </div>
@endif
