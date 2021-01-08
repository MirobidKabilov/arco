@extends('layouts.backend')
@section('content')
<main class="container-fluid mt--8">
    <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{route('backend.news.show')}}">Новости</a></li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- {{ dd($errors->all()) }} --}}
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0 h2">НОВОСТИ</h3>
                </div>
                {{-- {{dd($errors->all())}} --}}
                <form class="pt-4" action="{{ route('backend.news.postform', ['id' => $id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <input type="hidden" name="id">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">RU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">UZ</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="title_ru" class="col-form-label form-control-label">Заголовок</label>
                                        <input class="form-control" type="text" id="title_ru" name="title_ru" value="{{ empty($news) ? old('title_ru') : $news->{'title_ru'} }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="short_text_ru" class="col-form-label form-control-label">Краткий текст</label>
                                        <input class="form-control" type="text" id="short_text_ru" name="short_text_ru" value="{{ empty($news) ? old('short_text_ru') : $news->{'short_text_ru'} }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="text_ru" class="col-form-label form-control-label">Описание</label>
                                        <textarea type="text" class="form-control js-selector" id="text_ru" name="text_ru">{{ empty($news) ? old('text_ru') : $news->{'text_ru'} }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="type" class="col-form-label form-control-label">Тип</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="news" {{ (!empty($news) && $news->type=='news') ? 'selected' : '' }}>Новости</option>
                                            <option value="event" {{ (!empty($news) && $news->type=='event') ? 'selected' : '' }}>Мероприятия</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="img" class="col-form-label form-control-label">Изоброжение</label>
                                        <input class="form-control" type="file" id="img" name="img">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date" class="col-form-label form-control-label">Дата публикации</label>
                                            <div class="input-group">
                                                {{-- <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div> --}}
                                                <input class="form-control date" id="date" name="published_at" value="{{ $news ? $news->published_at : ' ' }}" placeholder="Select date" type="text">
                                            </div>
                                            @error('published_at')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="title_uz" class="col-form-label form-control-label">Заголовок</label>
                                        <input class="form-control" type="text" id="title_uz" name="title_uz" value="{{ empty($news) ? old('title_uz') : $news->{'title_uz'} }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="short_text_uz" class="col-form-label form-control-label">Краткий текст</label>
                                        <input class="form-control" type="text" id="short_text_uz" name="short_text_uz" value="{{ empty($news) ? old('short_text_uz') : $news->{'short_text_uz'} }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="text_uz" class="col-form-label form-control-label">Описание</label>
                                        <textarea class="form-control js-selector" type="text" id="text_uz" name="text_uz">{{ empty($news) ? old('text_uz') : $news->{'text_uz'} }}</textarea>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="p-4 text-right">
                            <a href="{{ route('backend.news.show') }}" class="btn btn-secondary" data-dismiss="modal">Отменить</a>
                            <button type="submit" class="btn btn-default">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
<script src="{{asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.mask.js')}}"></script>
<script>
    $('.date').mask('00-00-0000', {placeholder: "день-месяц-год"});
    tinymce.init({
      selector: 'textarea',
      height: 700,
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
    });
</script>
@endsection