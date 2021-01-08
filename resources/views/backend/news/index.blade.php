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
                    <li class="breadcrumb-item"><a href="{{route('backend.news.show')}}">Новости</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
            <a href="{{route('backend.news.getform')}}" class="btn btn-dark m-b-sm btn-add pull-right">
                <i class="fa fa-plus"></i> Добавить
            </a>
        </div>
    </div>
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0 h2">НОВОСТИ</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable" style="width: 100%">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Дата</th>
                                <th>Заголовок</th>
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

@include('partials.remove')
@endsection

@section('script')
<script src="{{asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/crud.js')}}"></script> 
<script>
    var is_waiting = false;
    var form = "{{ route('backend.news.getform') }}";
    var crud = new Crud({
        filter: true,
        list: {
            url: "{{route('backend.news.data')}}",
            datatable: {
                columns: [
                {data: 'id', name: 'id'},
                {data: 'published_at', name: 'published_at'},
                {data: 'title_ru', name: 'name_ru'},
                {data: 'img', name: 'img'}
                ],
                columnDefs: [
                    { 
                        targets: 4,
                        data: null,
                        searchable:false, 
                        render: function (row, type, val, meta) {
                            return '<div class="text-right">' + '<a href="'+ form + '/' + val.id +'" class="btn btn-default btn-edit"><i class="fa fa-pen"></i></a> ' +
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
      url: "{{ route('backend.news.delete') }}",
    }
  })
</script>
@endsection