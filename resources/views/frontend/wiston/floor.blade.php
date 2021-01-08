@extends('layouts.frontend')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/building.css?v=1.1') }}">
<style>
.complex-tooltip--sold {
  background-color:rgb(165, 4, 4);
}
/* @foreach ($floor->apartments()->where('status', 2)->get() as $apartment)
.complex_svg svg g[data-id="{{ $apartment->number }}"] {
  fill:#c00;
  opacity:0.4
}
@endforeach */

</style> 

@endsection

@section('content')
<section class="">
  <div class="body-black floors-padding">
    <div class="corp corp--center">
      <img src="{{ asset('storage/'.$floor->img) }}" id="image_area" alt="" title="" style="vertical-align: bottom;">
      <div class="complex_svg">
          {!! $floor->svg_code !!}
      </div>
    </div>
    @foreach ($floor->apartments as $apartment)
    <div class="complex-tooltip{{ $apartment->status == 2 ? ' complex-tooltip--sold' : '' }}" id="tooltip-{{ $apartment->number }}">№ {{ $apartment->number }} ({{ $apartment->total_area }} m<sup>2</sup>)</div>
    @endforeach
  </div>
</section>  
  {{-- <div id="tooltip" class="complex-tooltip"></div> --}}
@endsection




@section('scripts')
<script>

(function($) {
  'use strict';
  var mouseX;
  var mouseY;
  $(document).mousemove( function(e) {
    // mouse coordinates
    mouseX = e.pageX; 
    mouseY = e.pageY;
  });

  // hover
  $(".complex_svg g").mouseover(function(e){
    $(".complex_svg g").addClass('no-animation');
    var _id = $(this).attr('data-id');
        
        // show tooltip
        $('#tooltip-' + _id).stop(false, true).show();

        // position tooltip relative to mouse coordinates
        $(this).mousemove(function() {
            $('#tooltip-' + _id).css({'top':mouseY - 20,'left':mouseX + 40});   
        }); 
  }).mouseout(function(e) {
    var _id = $(this).attr('data-id');
        $(".complex_svg g").removeClass('no-animation');
        // hide tooltip
        $('#tooltip-' + _id).stop(false, true).hide();
  });

  $('.complex_svg g').click(function(e) {
    var _id = $(this).attr('data-id');
    window.location.href = '{{ route("home") }}/apartment/'  + _id
    // window.location.href = window.location.href + '/' + _id
  });

  function calcHeight()
  {
    var _wh = $(window).height();
    $('.corp').css('height', (_wh - 100) + 'px')
  }

  $(window).resize(function() {
    calcHeight()
  })

  calcHeight()

  $(document).ready(function () {
    setTimeout(function(){
        //Elements to loop through
          var elem = $('.complex_svg > svg > g'),
          //Start at 0
          i = 0;

          function getMessage() {
            //Loop through elements
            $(elem).each( function(index) {
              if (i == index ) {
                //Show active element
                $(this).addClass('home-animation');
                
              } else if (i == $(elem).length ) {
                //Show message
                $(this).addClass('home-animation');
                //Reset i lst number is reached
                i = 0;
              } else {
                //Hide all non active elements
                $(this).removeClass('home-animation');
              }
              
            });
            i++;
          }
          getMessage();
          //Repeat
          window.setInterval(getMessage, 3000);
    }, 2000);
  });
  
})(jQuery);
</script>
@endsection