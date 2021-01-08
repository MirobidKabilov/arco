@extends('layouts.frontend')
@section('styles')

@endsection
@section('content')
<header class="page-header" data-background="{{ asset('assets/frontend/images/bg-pages.jpg') }}" data-stellar-background-ratio="1.15">
	<div class="container">
		<h1>@lang('main.menu.contact')</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('main.menu.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('main.menu.contact')</li>
		</ol>
	</div>
</header>
<section class="contact">
    <div class="container">
		<div class="row">
			<div class="col-lg-3 mb-3">
				<div>
					<p class="mb-1 font-weight-bold">Телефон:</p>
					<a class="mb-1" href="tel:+998991110110">+998 (99) 111-01-10</a><br>
					<a href="tel:+998991110100">+998 (99) 111-01-00</a>
				</div>	
			</div>

			<div class="col-lg-3 mb-3">
				<div>
					<p class="mb-1 font-weight-bold">Почта:</p>
					<a class="mb-1" href="mailto:info@arcobuilding.uz">info@arcobuilding.uz</a><br>
					<ul class="social-media-contact">
						<li><a href="https://www.facebook.com/arcobuilding.uz/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="https://instagram.com/arcobuilding.uz" target="_blank"><i class="fab fa-instagram"></i></a></li>
						<li><a href="https://t.me/arcobuildinguz"><i class="fab fa-telegram-plane"></i></a></li>
					  </ul>
				</div>	
			</div>

			<div class="col-lg-2 mb-3">
				<div>
					<p class="mb-1 font-weight-bold">@lang('main.address_title'):</p>
					@lang('main.address')
				</div>	
			</div>
			<div class="col-lg-4 mb-2">
				<div>
					<p class="mb-1 font-weight-bold">@lang('main.date')</p>
					@lang('main.date_work')
				</div>	
			</div>
		</div>
         <!-- end row -->
      <div class="row align-items-center">
          <div class="col-lg-6">
               <div class="map">
            <div class="pattern-bg" data-stellar-ratio="1.03" style="display: none; top: -33.1875px;"></div>
            <!-- end pattern-bg -->
            <div class="holder" data-stellar-ratio="1.07" style="display: none; top: 0px;"> 
				<div class="map" id="map"></div>
           </div>
            <!-- end holder --> 
          </div>
          <!-- end map -->
          </div>
          <!-- end col-6 -->
          <div class="col-lg-6">	
              <div class="contact-form">	
				  <form id="contact" method="post" action="{{ route('contact-form') }}">
					@csrf
						<div class="form-group">
							<input type="text" name="name" id="name" autocomplete="off" required>
							<span>@lang('main.contact.name')</span>
						</div>
						<!-- end form-group -->
						<div class="form-group"> 
							<input type="text" name="phone" id="phone" autocomplete="off" required>
							<span>@lang('main.contact.phone')</span>
						</div>
						<!-- end form-group -->            
						<!-- end form-group -->
						<div class="form-group"> 
						<textarea name="message" id="message" autocomplete="off" required></textarea>
						<span>@lang('main.contact.message')</span>
						</div>
						<!-- end form-group -->
						<div class="form-group">
						<button id="submit" type="submit" type="submit">
							@lang('main.contact.send')
						</button>
					</form>
				</div>
            <!-- end form-group -->          				  		  
          <!-- end form-group -->
          	</div>
          <!-- end contact-form -->
          	</div>
          <!-- end col-6 -->
     </div>
      <!-- end row --> 
    </div>
    <!-- end container --> 
  </section>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFi_PN_r8vb_bt0Y0VXeei6q8E21LDD98&callback=initMap"></script>
<script>
	var map;
  var image = '{{ asset('assets/frontend/images/mark.svg') }}';    
  var myLatLng = {lat: 41.3229615, lng:69.2925615};
  function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
    zoom: 15,
    styles: [
    {
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#134457"
        }
      ]
    },
    {
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#746855"
        }
      ]
    },
    {
      "elementType": "labels.text.stroke",
      "stylers": [
        {
          "color": "#242f3e"
        }
      ]
    },
    {
      "featureType": "administrative.locality",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#d59563"
        }
      ]
    },
    {
      "featureType": "poi",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#d59563"
        }
      ]
    },
    {
      "featureType": "poi.park",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#263c3f"
        }
      ]
    },
    {
      "featureType": "poi.park",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#6b9a76"
        }
      ]
    },
    {
      "featureType": "road",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#38414e"
        }
      ]
    },
    {
      "featureType": "road",
      "elementType": "geometry.stroke",
      "stylers": [
        {
          "color": "#212a37"
        }
      ]
    },
    {
      "featureType": "road",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#9ca5b3"
        }
      ]
    },
    {
      "featureType": "road.highway",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#746855"
        }
      ]
    },
    {
      "featureType": "road.highway",
      "elementType": "geometry.stroke",
      "stylers": [
        {
          "color": "#1f2835"
        }
      ]
    },
    {
      "featureType": "road.highway",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#f3d19c"
        }
      ]
    },
    {
      "featureType": "transit",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#2f3948"
        }
      ]
    },
    {
      "featureType": "transit.station",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#d59563"
        }
      ]
    },
    {
      "featureType": "water",
      "elementType": "geometry",
      "stylers": [
        {
          "color": "#17263c"
        }
      ]
    },
    {
      "featureType": "water",
      "elementType": "labels.text.fill",
      "stylers": [
        {
          "color": "#515c6d"
        }
      ]
    },
    {
      "featureType": "water",
      "elementType": "labels.text.stroke",
      "stylers": [
        {
          "color": "#17263c"
        }
      ]
    }
  ]
});

		var icon = {
			url: image, // url
			scaledSize: new google.maps.Size(80, 80), // scaled size
			origin: new google.maps.Point(0,0), // origin
			anchor: new google.maps.Point(0, 0) // anchor
		};


        var marker = new google.maps.Marker({
            position: {lat:41.3229615,lng:69.2925615},
            map: map,
            icon: icon
        });
	}
	
	@if (session()->has('success_contact'))
	swal({
		text: "{{ session()->get('success_contact') }}",
		icon: "success",
	});
	@endif	
</script>
@endsection