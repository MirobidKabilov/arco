@extends('layouts.backend')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
@endsection

@section('content')
<main class="container-fluid mt--8">
    <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#">Партнеры</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
            <button type="button" class="btn btn-dark m-b-sm btn-add pull-right" data-toggle="modal" data-target="#formModal">
                <i class="fa fa-plus"></i> Добавить
            </button>
        </div>
    </div>
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0 h2">ПАРТНЕРЫ</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable" style="width: 100%">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Заголовок</th>
                                <th>Ссылка</th>
                                <th>Фото</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog apartment-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ПАРТНЕРЫ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form" method="POST" enctype="multipart/form-data">
                    {{-- @csrf --}}
                    <input type="hidden" name="id">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="title_ru" class="col-form-label form-control-label">Заголовок (RU)</label>
                            <input class="form-control" type="text" id="title_ru" name="title_ru">
						</div>
						<div class="col-md-6">
							<label for="title_uz" class="col-form-label form-control-label">Заголовок (UZ)</label>
                            <input class="form-control" type="text" id="title_uz" name="title_uz">
						</div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="link" class="col-form-label form-control-label">Ссылка</label>
                            <input class="form-control" type="text" id="link" name="link">
                        </div>
                        <div class="col-md-6">
                            <label for="img" class="col-form-label form-control-label">Изоброжение</label>
                            <input class="form-control" type="file" id="img" name="img">
                        </div>                       
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-default ajax-form">Сохранить</button>
            </div>
        </div>
    </div>
</div>

  @include('partials.remove')
@endsection

@section('script')
<script src="{{asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/crud.js')}}"></script> 
<script>
  var crud = new Crud({
    filter: true,
    form: {
      url: "{{ route('backend.partners.form') }}",
    },

    list: {
      url: "{{route('backend.partners.data')}}",
      datatable: {            
        columns: [
          {data: 'id', name: 'id'},
          {data: 'title_ru', name: 'name_ru'},
          {data: 'link', name: 'link'},
          {data: 'img', name: 'img'}
        ],
        columnDefs: [
            {
                targets: 4,
                data: null,
                searchable:false, 
                render: function (row, type, val, meta) {
                    return '<div class="text-right">' +
                    crud.makeButton(val, 'btn-default btn-edit', '<i class="fa fa-pen"></i>', [
                        ['toggle', 'modal'],
                        ['target', '#formModal']
                    ]) +
                    crud.makeButton(val, 'btn-danger', '<i class="fa fa-trash"></i>', [
                        ['toggle', 'modal'],
                        ['target', '#removeModal']
                    ]) + '</div>';
                }
            }
        ]
      }
    },

    remove: {
      url: "{{ route('backend.partners.delete') }}",
    }
  })
</script>
@endsection