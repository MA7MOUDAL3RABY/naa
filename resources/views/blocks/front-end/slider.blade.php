@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet" />
@endsection
@section('body')
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endsection

@if(have_rows('content'))
<div id="theme-slider" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner py-5">
    <div class="mx-auto mt-10 py-5">
      @php($count = 1)
      @while (have_rows('content')) @php(the_row())
      @if(get_sub_field('main_image'))
      <div @class(['carousel-item', 'active'=> $count == 1])>
        <div class="row justify-content-between align-items-center container">
          <div class="col-12 col-md-5">
            <h2 class="title rollable-text text-lighten">{!! get_sub_field('title') !!}</h2>
            <div class="px-4 my-3">
              {!! get_sub_field('description') !!}
            </div>
            <div class="my-5"></div>
            <img class="slider-icon-img ms-auto dark-invert" src="{{get_sub_field('icon_image')}}" alt="" />
            @if($count > 1)
            <div class="line"></div>

            <h2 class="count">{{ str_pad(0, 2, $count, STR_PAD_RIGHT) }}</h2>
            @endif
            <div class="my-2"></div>

            @if(get_sub_field('gallery'))
            <div class="col-12 v-col-md-6">
              <div class="gallery d-flex gap-2">
                @foreach(get_sub_field('gallery') as $image)
                <a href="{{ $image['url'] }}" data-lightbox="gallery-{{ $count }}">
                  <img src="{{ $image['sizes']['square_small'] }}" alt="Image {{ $loop->iteration }}">
                </a>
                @endforeach
              </div>
            </div>
            @endif
          </div>
          <div class="col-12 col-md-7 position-relative">
            @if (get_sub_field('has_buttons'))
            {{-- <transition-group name="fade" tag="div" class="flex flex-wrap justify-center"> --}}
              @php($index = 0)
              @while (have_rows('buttons')) @php(the_row())
              @php($index++)
              <div class="animated-button m-2" style="animation-delay:  {{ $index * 0.0001 }}s;{{get_sub_field('style')}}">
                {{ get_sub_field('label') }}
              </div>
              @endwhile
            {{-- </transition-group> --}}
            @endif
            <div class="slider-img"
              style="background-image: url({{ get_field('main_image_bg') ?? ''}})">

              <img class="block me-0 ms-auto" draggable="false" src="{{ get_sub_field('main_image')}}"
                alt="{{ get_sub_field('title') }}" />
            </div>
          </div>
        </div>
      </div>
      @endif
      @php($count++)

      @endwhile
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#theme-slider" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#theme-slider" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
@endif
