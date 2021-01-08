@extends('layouts.frontend')
@section('styles')
<link href="{{ asset('assets/frontend/css/sweet.min.css') }}" rel="stylesheet">
@endsection
@section('content')
  <section class="apartment pb-layout">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-3">
          <table class="table-appartment">
            <tbody>
                <tr>
                  <td class="table-appartment__td1">
                      <div class="table-appartment__dots">
                          <span class="table-appartment__info">№</span>
                      </div>
                  </td>
                  <td class="table-appartment__td2">{{ $apartment->number }}</td>
              </tr>
                <tr>
                    <td class="table-appartment__td1">
                        <div class="table-appartment__dots">
                            <span class="table-appartment__info">@lang('main.show_page.block')</span>
                        </div>
                    </td>
                    <td class="table-appartment__td2 text-uppercase">{{ $apartment->floor->block->name }}</td>
                </tr>
                <tr>
                  <td class="table-appartment__td1">
                      <div class="table-appartment__dots">
                          <span class="table-appartment__info">@lang('main.show_page.floor')</span>
                      </div>
                  </td>
                  <td class="table-appartment__td2">{{ $apartment->floor->number }}</td>
              </tr>
              <tr>
                <td class="table-appartment__td1">
                    <div class="table-appartment__dots">
                        <span class="table-appartment__info">@lang('main.show_page.room')</span>
                    </div>
                </td>
                <td class="table-appartment__td2">{{ $apartment->rooms }}</td>
              </tr>
              <tr>
                <td class="table-appartment__td1">
                    <div class="table-appartment__dots">
                        <span class="table-appartment__info">@lang('main.show_page.area')</span>
                    </div>
                </td>
                <td class="table-appartment__td2">{{ $apartment->total_area }} m²</td>
              </tr>
              <tr>
                <td class="table-appartment__td1">
                    <div class="table-appartment__dots">
                        <span class="table-appartment__info">@lang('main.show_page.ceiling_height')</span>
                    </div>
                </td>
                <td class="table-appartment__td2">{{ $apartment->ceiling_height }} м</td>
              </tr>
              @if($apartment->status == 0)
              <tr>
                <td class="table-appartment__td1">
                    <div class="table-appartment__dots">
                        <span class="table-appartment__info">@lang('main.show_page.price')</span>
                    </div>
                </td>
                <td class="table-appartment__td2">
                    {{ $apartment->price > 0 ? number_format($apartment->price, 0, '', ' ').' сумм / m²' :  __('main.negotiable') }}   
                </td>
              </tr>
              @endif
            </tbody>
        </table>
        @if($apartment->status == 0 && $apartment->price > 0)
            <h2 class="mt-15 font-size-40"><span>{{ number_format($apartment->price*floatval($apartment->total_area), 0, '', ' ') }} сум.</span></h2>
        @else 
            @if($apartment->status == 2)
                <h2 class="mt-15 font-size-40"><span>@lang('main.sales')</span></h2>
            @elseif($apartment->status == 1)
                <h2 class="mt-15 font-size-40"><span>@lang('main.bron')</span></h2>
            @endif
        @endif

            <button class="btn mt-15 btn--fill js-modal">@lang('main.show_page.feedback')</button>
        </div>
        <div class="col-md-6">
            <ul class="nav nav-pills pl-0" id="pills-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="pill" href="#tab-one">@lang('main.show_page.offer_plan')</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#tab-two">@lang('main.show_page.schema')</a> </li>
            </ul>
            {{-- <h2 class="font-size-28">@lang('main.show_page.offer_plan')</h2> --}}
            <div class="tab-content wow fadeInUp">
                <div class="tab-pane fade show active" id="tab-one">
                    <a href="{{ asset('/storage/'.$apartment->img) }}" data-fancybox class="image-inner"> 
                        <img src="{{ asset('/storage/'.$apartment->img) }}" alt="Image" class="property-plan mt-0">
                    </a>
                </div>
                <div class="tab-pane fade" id="tab-two">
                    <a href="{{ asset('/storage/'.$apartment->img_schema) }}" data-fancybox class="image-inner"> 
                        <img src="{{ asset('/storage/'.$apartment->img_schema) }}" alt="Image" class="property-plan mt-0">
                    </a>
                </div>
            </div>
        </div>
      
    <!-- end container --> 
  </section>
@endsection
@section('modal')
<div class="modal">
    <div class="modal__content">
        <form action="{{ route('application') }}" method="POST" class="feedback-form">
            @csrf
            <input type="hidden" name="apartment_id" value="{{ $apartment->id }}" class="js-hidden-input">
            <div class="modal__header">
                <h3>@lang('main.show_page.feedback')</h3>
            </div>
            <div class="form-group">
                <input class="contact-block__input-text" name="name" placeholder="@lang('main.contact.name')" type="text"/ required>
            </div>

            <div class="form-group">
                <input type="text" name="phone" placeholder="@lang('main.show_page.phone_number')" class="contact-block__input-text js-phone"  id="phone" required>
            </div>
            
            <div class="form-group">
                <textarea class="contact-block__input-textarea" name="message" placeholder="@lang('main.contact.message')" required></textarea>
            </div>
            
            <div class="text-right">
                <button class="contact-block__submit btn mt-30">@lang('main.contact.send')
                    <span class="contact-block__submit-icon icofont-caret-right"></span>
                </button>
            </div>
            <span class="modal__close">×</span>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/frontend/js/sweet.min.js') }}"></script>
<script>
    @if(session()->has('success'))
        swal({
            title: '<i class="fa fa-thumbs-up"></i>',
            text: '{{ session()->get("success") }}',
            type: 'success',
            confirmButtonColor: '#ebcfa7'
        });
    @endif
</script>
@endsection