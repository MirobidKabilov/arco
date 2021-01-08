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
					<li class="breadcrumb-item"><a href="{{route('backend.floors.show', [$block_id])}}">Этажи</a></li>
                    <li class="breadcrumb-item active">Квартиры</li>
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
                    <h3 class="mb-0 h2">КВАРТИРЫ</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable" style="width: 100%">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Номер квартиры</th>
                                <th>Подъезд</th>
                                <th>Площадь</th>
                                <th>Комнаты</th>
                                {{-- <th>Цена</th> --}}
                                <th>Статус</th>
                                <th>Изображение</th>
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
	<div class="modal-dialog apartment-modal" role="document" style="width: 1000px !important">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">КВАРТИРЫ</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" id="form" method="POST" enctype="multipart/form-data">
					{{-- @csrf --}}
					<input type="hidden" name="id">
          <input type="hidden" name="floor_id" value="{{ $floor_id }}" class="js-non-editable">
          <div class="form-group row">
						<div class="col-md-6">
							<label for="number" class="col-form-label form-control-label">Номер квартиры</label>
							<input class="form-control" type="text" id="number" name="number">
            </div>
            <div class="col-md-6">
              <label for="price" class="col-form-label form-control-label">Цена</label>
              <input class="form-control" type="text" id="price" name="price">
              </div>
          </div>
          <div class="form-group row">
						<div class="col-md-6">
							<label for="entrance" class="col-form-label form-control-label">Подъезд</label>
							<input class="form-control" type="text" id="entrance" name="entrance">
            </div>
            <div class="col-md-6">
              <label for="total_area" class="col-form-label form-control-label">Площадь</label>
              <input class="form-control" type="text" id="total_area" name="total_area">
            </div>
          </div>
					<div class="form-group row">
						<div class="col-md-6">
							<label for="balcony" class="col-form-label form-control-label">Площадь балкона</label>
							<input class="form-control" type="text" id="balcony" name="balcony">
            </div>
            <div class="col-md-6">
              <label for="ceiling_height" class="col-form-label form-control-label">Высота потолка</label>
              <input class="form-control" type="text" id="ceiling_height" name="ceiling_height">
            </div>
					</div>
					<div class="form-group row">
						<div class="col-md-6">
							<label for="rooms" class="col-form-label form-control-label">Комнаты</label>
							<select class="form-control" id="rooms" name="rooms">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
						</div>
						<div class="col-md-6">
							<label for="status" class="col-form-label form-control-label">Статус</label>
							<select class="form-control" id="status" name="status">
								<option value="0">В продаже</option>
								<option value="1">Забронирована</option>
								<option value="2">Продано</option>
							</select>
            			</div>
          			</div>
					<div class="form-group row">
            <div class="col-md-6">
              <label for="img_schema" class="col-form-label form-control-label">Схема</label>
              <input class="form-control" type="file" id="img_schema" name="img_schema">
              </div>
						<div class="col-md-6">
						<label for="img" class="col-form-label form-control-label">Изображение</label>
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
      url: "{{ route('backend.apartments.form') }}",
    },

    list: {
      url: "{{route('backend.apartments.data')}}",
	  data: {
          floor_id: "{{ $floor_id }}"
      },
      datatable: {            
        columns: [
          	{data: 'id', name: 'id'},
          	{data: 'number', name: 'number'},
          	{data: 'entrance', name: 'entrance'},
          	{data: 'total_area', name: 'total_area'},
          	{data: 'rooms', name: 'rooms'},
          	// {data: 'price', name: 'price'},
			{data: 'status_name', name: 'status'},
          	{data: 'img', name: 'img'},
        ],
        columnDefs: [                                 
          {
            targets: 7,
            data: null,
            searchable:false, 
            render: function (row, type, val, meta) {                                                                         
              return '<div class="text-right">' + crud.makeButton(val, 'btn-default btn-edit', '<i class="fa fa-pen"></i>', [
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
      url: "{{ route('backend.apartments.delete') }}",
    }
  })
</script>
@endsection