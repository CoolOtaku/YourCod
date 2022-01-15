@extends('app.admin-cap')
@section('title-block')Реєстрація нового адміна @endsection
@section('content')
<form method="POST" action="{{ route('admin.register') }}">
    @csrf
    <div class="form-floating mb-3 mt-3">
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{old('email')}}">
        <label for="email">Електронна адреса</label>
        @error('email')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{old('name')}}">
        <label for="name">Ім`я</label>
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{old('password')}}">
        <label for="password">Пароль</label>
        @error('password')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password" value="{{old('password_confirmation')}}">
        <label for="password_confirmation">Підтвердіть пароль</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Зареєструвати</button>
    <a class="btn btn-lg btn-primary mt-3" href="{{url()->previous()}}" style="margin-bottom: 25px;" role="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
        </svg>
        Повернутися</a>
    <p class="mt-5 mb-3 text-muted">© Cool_Otaku</p>
</form>
@endsection
