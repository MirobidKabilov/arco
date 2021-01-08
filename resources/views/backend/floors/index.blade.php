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
                    <li class="breadcrumb-item"><a href="{{route('backend.blocks.show')}}">Блоки</a></li>
                    <li class="breadcrumb-item active">Этажи</li>
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
                    <h3 class="mb-0 h2">ЭТАЖИ</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable" style="width: 100%">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Блок</th>
                                <th>Этаж</th>
                                <th>Изоброжение</th>
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
                <h5 class="modal-title" id="exampleModalLabel">ЭТАЖИ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form" method="POST" enctype="multipart/form-data">
                    {{-- @csrf --}}
                    <input type="hidden" name="id">
                    <input type="hidden" name="block_id" value="{{ $id }}" class="js-non-editable">
                    <div class="form-group row">                        
                        {{-- <div class="col-md-6">
                            <label for="name_ru" class="col-form-label form-control-label">Название (RU)</label>
                            <input class="form-control" type="text" id="name_ru" name="name_ru">
                        </div> --}}
                        {{-- <div class="col-md-4">
                            <label for="name_en" class="col-form-label form-control-label">Имя_en</label>
                            <input class="form-control" type="text" id="name_en" name="name_en">
                        </div> --}}
                        {{-- <div class="col-md-6">
                            <label for="name_uz" class="col-form-label form-control-label">Название (UZ)</label>
                            <input class="form-control" type="text" id="name_uz" name="name_uz">
                        </div> --}}
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="number" class="col-form-label form-control-label">Этаж</label>
                            <input class="form-control" type="text" id="number" name="number">
                        </div>
                        <div class="col-md-6">
                            <label for="img" class="col-form-label form-control-label">Изоброжение</label>
                            <input class="form-control" type="file" id="img" name="img">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="svg_code" class="col-form-label form-control-label">SVG код</label>
                            <textarea class="form-control" id="svg_code" name="svg_code"></textarea>
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
      url: "{{ route('backend.floors.form') }}",
    },

    list: {
      url: "{{route('backend.floors.data')}}",
      data: {
          block_id: "{{ $id }}",
      },
      datatable: {            
        columns: [
          {data: 'id', name: 'id'},
          {data: 'block_name', name: 'block_name'},
          {data: 'number', name: 'number'},
          {data: 'img', name: 'img'}
        ],
        columnDefs: [                                 
            {
                targets: 4,
                data: null,
                searchable:false, 
                render: function (row, type, val, meta) {                                                                         
                return '<div class="text-right">' + '<a href="' + row.apartment_url + '" class="btn btn-outline-default">Квартиры</a>' +
                crud.makeButton(val, 'btn-default btn-edit', '<i class="fa fa-pen"></i>', [
                    ['toggle', 'modal'],
                    ['target', '#formModal']
                ]) +
                (val.apartments_count > 0 ? "<button class='btn btn-danger' disabled>" + '<i class="fa fa-trash"></i>' + "</button>" : 
					crud.makeButton(val, 'btn-danger', '<i class="fa fa-trash"></i>', [
                        ['toggle', 'modal'],
                        ['target', '#removeModal']
                    ])) 
                    + '</div>';
                }
            }
        ]
      }
    },

    remove: {
      url: "{{ route('backend.floors.delete') }}",
    }
  })
</script>
@endsection