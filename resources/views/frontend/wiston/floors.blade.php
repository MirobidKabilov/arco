@extends('layouts.frontend')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/building.css?v=1.1') }}">
@endsection

@section('content')
<div class="heading-house">
    <div class="corp">
        <img src="{{ asset('/storage/'.$block->img) }}" id="image_area" alt="" title="" style="vertical-align: bottom; width: 100%;">
        <div class="complex_svg">
            {!! $block->svg_code !!}
        </div>
    </div>
</div>
@foreach ($block->floors as $floor)
<div class="complex-tooltip" id="tooltip-{{ $floor->id }}">{{ $floor->block->name }}/{{ $floor->number }} @lang('apartment.floor')</div>
@endforeach
  {{-- <div class="complex-tooltip" id="tooltip-2">@lang('glinka.block.a')/ 4 @lang('glinka.floor')</div>
  <div class="complex-tooltip" id="tooltip-3">@lang('glinka.block.a')/ 5 @lang('glinka.floor')</div>
  <div class="complex-tooltip" id="tooltip-4">@lang('glinka.block.a')/ 6 @lang('glinka.floor')</div>
  <div class="complex-tooltip" id="tooltip-5">@lang('glinka.block.a')/ 7 @lang('glinka.floor')</div>
  <div class="complex-tooltip" id="tooltip-6">@lang('glinka.block.a')/ 8 @lang('glinka.floor')</div>
  <div class="complex-tooltip" id="tooltip-7">@lang('glinka.block.a')/ 9 @lang('glinka.floor')</div>
  <div class="complex-tooltip" id="tooltip-8">@lang('glinka.block.a')/ 10 @lang('glinka.floor')</div>
  <div class="complex-tooltip" id="tooltip-9">@lang('glinka.block.a')/ 11 @lang('glinka.floor')</div>
  <div class="complex-tooltip" id="tooltip-10">@lang('glinka.block.a')/ 12 @lang('glinka.floor')</div>
  <div class="complex-tooltip" id="tooltip-11">@lang('glinka.block.b')/ 3 @lang('glinka.floor')</div>
  <div class="complex-tooltip" id="tooltip-12">@lang('glinka.block.b')/ 4 @lang('glinka.floor')</div>
  <div class="complex-tooltip" id="tooltip-13">@lang('glinka.block.b')/ 5 @lang('glinka.floor')</div>
  <div class="complex-tooltip" id="tooltip-14">@lang('glinka.block.b')/ 6 @lang('glinka.floor')</div>
  <div class="complex-tooltip" id="tooltip-15">@lang('glinka.block.b')/ 7 @lang('glinka.floor')</div>
  <div class="complex-tooltip" id="tooltip-16">@lang('glinka.block.b')/ 8 @lang('glinka.floor')</div>
  <div class="complex-tooltip" id="tooltip-17">@lang('glinka.block.b')/ 9 @lang('glinka.floor')</div>
  <div class="complex-tooltip" id="tooltip-18">@lang('glinka.block.b')/ 10 @lang('glinka.floor')</div>
  <div class="complex-tooltip" id="tooltip-19">@lang('glinka.block.b')/ 11 @lang('glinka.floor')</div>
  <div class="complex-tooltip" id="tooltip-20">@lang('glinka.block.b')/ 12 @lang('glinka.floor')</div> --}}
@endsection

@section('modal')
<div class="modal">
    <div class="modal__content modal__content--lg">
        <span class="modal__close">×</span>
        <div class="modal__header">
            <h3>План этажа</h3>
        </div>
        <div class="floor js-floor">
            
        </div>
    </div>
</div>
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

    function openModal(_id) {
        $('.js-floor').load('/apartment/floor/' + _id);
        $('.modal').fadeIn(300);
        $('.modal__content').addClass('modal__open');
        $('body').addClass('over-f');
    }
    
    $('.complex_svg g').click(function(e) {
        var _id = $(this).attr('data-id');
        window.location.href = window.location.href + '/' + _id
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