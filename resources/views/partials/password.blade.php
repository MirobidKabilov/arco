@extends('layouts.backend')
@section('content')
<main class="container-fluid mt--8">
    <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item active">Мои настройки</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0 h2">Мои настройки</h3>
                </div>
                {{-- {{dd($errors->all())}} --}}
                <form method="POST" action="{{ route('backend.password.form') }}" class="pt-4">
                    @csrf
                    <div class="container">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                         <div class="form-group row">
                            <div class="col-md-12">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Действующий Пароль</label>
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                                @error('current_password')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Новый Пароль</label>
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                @error('new_password')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Подтвердить Пароль</label>
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                                @error('new_confirm_password')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="p-4 text-right">
                            <a href="javascript: history.go(-1)" class="btn btn-secondary">Отменить</a>
                            <button type="submit" class="btn btn-default">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection