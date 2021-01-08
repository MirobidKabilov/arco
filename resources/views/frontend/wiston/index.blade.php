@extends('layouts.frontend')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/building.css?v=1.1') }}">
@endsection

@section('content')
<section class="body-black">
    <div class="heading-house">
      <div class="corp">
        <img src="{{ asset('assets/frontend/images/wiston/main.jpg') }}" id="image_area" alt="" title="" style="vertical-align: bottom; width: 100%;">
        <div class="complex_svg">
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 3840 2160" style="enable-background:new 0 0 3840 2160;" xml:space="preserve">
            <g data-id="2">
            <path d="M2275.8,623.5v34.5h53.9c0,0,21-15.9,40.8,19l20.2,13.1l3.2,1062.7l325.8-125.6v-20l18.6-7.3v-77.2l25.3-8v-32l-59.3-15.3
              l-1.3-13.3l10.7-0.7l-4.7-237l3.3-1.3v-26.9l-3.3-20.4l-5.3-4l-2-147.2l12.7-36l-1.3-12l6-2.7l-8.7-4.7l-8.7-0.7l-1.3-53.9l9.3-1.3
              l-1.3-12.7l5.3-3.3l-5.3-6.7v-20.6l-16.6-8.7l2-26l6.7-4.7l-8-8.7v-13.3l2.7-4.7l-18.6-8.7v-8l-10.7-3.3l8-8l-9.3-4.7
              c0,0,1.3-23.3-30.6-15.3l-0.7-16.6l3.3-4.7l-40-21.3l-23.3-13.3l-16-6.7l-1.3-7.3c0,0,0.7-6-29.3-0.7c0,0,7.3-7.3-18-4.7l5.3-6
              l-10-6.7l-53.9-2.7l-6-6h-10.7l-28.6-21.3h-9.3l-27.3-21.3L2275.8,623.5z"/>
            </g>
            <g data-id="1">
            <path d="M2386.5,691.2l-12.4-7.5h-7.1c0,0-11.8-32.4-34-20.5l-64.8,0.8v-26.1l-18.2-7.1V611l7.1-3.9v-17.4l8.7-4.7l-15.8-9.5v-21.3
              l11.8-5.5l-11.8-8.7h-9l-28.3-21.6v-8.8l13.3-8.1l-17.7-11.8h-6.6c0,0-21.4-43.5-54.5-35.4l-19.1-13.3l-36.1,9.6l-52.5,0.7l0-13.6
              l-7.1,0v-30.2l8-5.3v-13.8l-8-0.3v-11.2l8.1-5.2v-26.5l-12.5-6.6l5.2-7.4V304h-81.7v-8.8l11.8-6.6v-15.5H1920
              c0,0-42.9-31.7-104.1,0l-42,0.7v17.7l11,5.2l0.7,11.8l-81.7-0.7l4.4,10.3v25.8l-13.3,2.9l13.3,39v70l-58.9-0.7l-33.1-6.6l-14,11.8
              c0,0-14.7-13.3-37.6,36.1h-13.3l-9.6,9.6l12.5,7.4l-6.6,13.3l5.2,2.9l-20.6,18.4l-7.4-2.2l-8.1,7.4l9.6,6.6l0.7,18.4l-10.3,5.2
              c0,0-28.7,2.2-33.1,6.6l-50.8-5.2l-99.4,81c0,0-12.5-5.9-20.6,17.7l-12.5,7.9l11,5.4l-33.9,25v11l-17.7,11l7.4,3.7v14.7L1254,771
              l9.6,5.2l1.5,30.2h-14.7l-6.6,5.9h5.9l-1.5,19.9l-11,7.4l9.6,4.4l-0.7,16.9l10.3,33.9l-4.4,50.1l2.2,4.4l-5.9,235.7h-6.6l6.6,9.6
              l-3.7,255.6l-7.4,4.4l5.9,5.2l-0.7,13.3l11,3.7l-2.9,54.5h-18.4l12.5,12.5v120.8l393.3,206.9h61.9v19.9h330.7l-0.7-21.4l79.3,0.5
              l277.7-114.8V691.2z"/>
            </g>
          </svg>
        </div>
      </div>
    </div>  
</section>

  <div class="complex-tooltip" id="tooltip-1">@lang('apartment.block.a')</div>
  <div class="complex-tooltip" id="tooltip-2">@lang('apartment.block.b')</div>
  {{-- <div class="complex-tooltip" id="tooltip-3">@lang('glinka.block.v')</div>
  <div class="complex-tooltip" id="tooltip-4">@lang('glinka.block.g')</div> --}}
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
    window.location.href = window.location.href + '/floors/' + _id
  })
		
      $(document).ready(function () {
          setTimeout(function(){
              //Elements to loop through
                var elem = $('.complex_svg > svg > g'),
                //Start at 0
                i = 0;
  
                function getMessage() {
                  
                  //Loop through elements
                  $(elem).each( function(index) {
                    if ( i == index ) {
                      //Show active element
                      $(this).addClass('home-animation');
                    } else if ( i == $(elem).length ) {
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