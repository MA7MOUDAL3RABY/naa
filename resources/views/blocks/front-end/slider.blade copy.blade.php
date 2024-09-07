<!--Start Banner Area-->
@if(get_field('slider_layout') == 'slider'|| get_field('slider_layout') == 'overlay')
<section class="banner">
  <div class="banner-area">
    @if(have_rows('slider_content'))
    <div class="slider hero-slider2 owl-carousel owl-theme">
      @while (have_rows('slider_content')) @php(the_row())
      <div class="slider-item banner-bg-4 position-relative" style="background: {{ get_sub_field('image') ? " url(".
        get_sub_field('image')['url'] . ")" : get_sub_field('background_color') ?? '' }}">
        <div @class(['h-100 overlay bg-transparent cotainer psition-absolute d-flex
          align-items-center', 'gred-overlay'=> get_sub_field('active_overlay')])>
          <div class="container">
            <div class="slider-content @if(get_field('slider_layout') == 'overlay') style2 opacity @endif">
              @if (get_sub_field('title'))
              <h1 class=" @if(get_field('slider_layout') == 'overlay') font-28 text-capitalize @endif"
                style="color: {{get_sub_field('content_color') ?? ''}}">{{get_sub_field('title')}}</h1>
              @endif

              @if (get_sub_field('description'))
              <p class="text-capitalize lh-sm" style="color: {{get_sub_field('content_color') ?? ''}}">
                {{get_sub_field('description')}}</p>
              @endif

              @php($link = get_sub_field('link'))

              @if($link)
              <a href="{{$link['url']}}" class="default-btn btn" target="{{$link['target'] ?? '_self'}}">
                {{$link['title']}}
              </a>
              @endif
            </div>
          </div>
        </div>
      </div>
      @endwhile
    </div>
    @endif
  </div>
  @if(get_field('slider_layout') == 'slider')
  <div class="bottom-bar bg-blue py-5">
    <div class="d-flex justify-content-center align-items-center gap-2">
      <div class="text cursor-pointer" x-data
        @click.prevent="scrollTo(0, document.getElementById('{{get_field('scroll_id')}}').offsetTop)">
        {{ __('Explore MUST', 'must') }}
      </div>
      <div class="slide-down-anim">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="30" viewBox="0 0 16 30" fill="none">
          <path d="M16 14.7425L16 9.59961L8 15.3139L0 9.59961L-2.24801e-07 14.7425L8 20.4568L16 14.7425Z"
            fill="white" />
        </svg>
      </div>
    </div>
  </div>
  @endif
</section>
@endif
@if(get_field('slider_layout') == 'avatar' && have_rows('avatars_slider'))
@php($c = 0)
<section class="avatar-slider bg-f4f6f9">
  <h3 class="text-center font-28 text-green py-4 m-0">{{ get_field('section_title') }}</h3>
  <div class="slider container slider_2 owl-carousel owl-theme">
    @while (have_rows('avatars_slider')) @php(the_row())

    @if( get_sub_field("slider_type") == 'image')
    <div class="slider-item banner-bg-4 position-relative" data-hash="hash-{{get_row_index()}}">
      <div @class(['gred-overlay'=> get_sub_field('active_overlay')])>

        <div class="slide d-flex align-items-stretch justify-content-between bg-blue">
          <div class="image-container col-md-5 col-12">
            <img class="h-100" src="{{ get_sub_field('image') ? get_sub_field('image')['url'] : '' }}" />
            <div class="gred-overlay"></div>
          </div>
          <div class="content p-5 col-md-7 d-flex align-items-center col-12">
            <div class="bg-dark-blue d-flex flex-column justify-around">

              @if (get_sub_field('description'))
              <p class="text-white font-24 mb-4">{{get_sub_field('description')}}</p>
              @endif

              @if (get_sub_field('name'))
              <h1 class="text-green font-18 text-capitalize font-weight-700 lh-sm mb-0">{{get_sub_field('name')}}</h1>
              @endif
              @if (get_sub_field('sub_title'))
              <span
                class="text-white text-capitalize font-15 font-weight-300 my-1 lh-sm">{{get_sub_field('sub_title')}}</span>
              @endif
              @php($count = get_sub_field('rate'))
              @if ($count)
              <div>
                @for ($i = 1; $i <= 5; $i++) <svg xmlns="http://www.w3.org/2000/svg" width="23" height="22"
                  viewBox="0 0 23 22" fill="none" @class(['stars mt-4',"checked"=> $i <= $count])>
                    <path
                      d="M5.64587 20.5807C5.4098 20.7231 5.11856 20.5118 5.18069 20.2432L6.60519 14.085C6.71471 13.6116 6.55356 13.1164 6.18637 12.798L1.40785 8.65517C1.19956 8.47459 1.31062 8.13238 1.58526 8.10854L7.90257 7.56017C8.38694 7.51812 8.80835 7.21166 8.99763 6.76382L11.4487 0.9644C11.5561 0.710324 11.9162 0.710324 12.0235 0.9644L14.4746 6.76382C14.6639 7.21167 15.0853 7.51812 15.5697 7.56017L21.887 8.10854C22.1616 8.13238 22.2727 8.47459 22.0644 8.65517L17.2859 12.798C16.9187 13.1164 16.7575 13.6116 16.8671 14.085L18.2915 20.2432C18.3537 20.5118 18.0624 20.7231 17.8264 20.5807L12.4138 17.3157C11.997 17.0642 11.4752 17.0642 11.0584 17.3157L5.64587 20.5807Z"
                      stroke="white" stroke-linejoin="round" />
                    </svg>
                    @endfor
              </div>
              @endif
            </div>
          </div>
        </div>

      </div>
    </div>
    @elseif(get_sub_field("slider_type") == 'video')
    @php( $c++)
    <div class="slider-item banner-bg-4 position-relative" data-hash="hash-{{get_row_index()}}">

      <div class="slide d-flex align-items-stretch justify-content-between bg-blue">
        <div class="image-container col-md-5 d-flex align-items-center justify-content-center">
          <video class="w-100 h-100 object-fit-cover" muted src="<?= get_sub_field(" video_upload")['url'] ?>">
            <source type="video/mp4" />
          </video>

          <!-- Button trigger modal -->
          <button type="button" class="btn position-absolute modal-btn" data-bs-toggle="modal"
            data-bs-target="#v-{{$c}}" style="z-index: 99999;">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
              <path
                d="M40 0C32.0888 0 24.3552 2.34596 17.7772 6.74121C11.1992 11.1365 6.07234 17.3836 3.04484 24.6927C0.0173314 32.0017 -0.774802 40.0444 0.768607 47.8036C2.31202 55.5628 6.12164 62.6902 11.7157 68.2842C17.3098 73.8783 24.4372 77.688 32.1964 79.2314C39.9556 80.7748 47.9983 79.9827 55.3073 76.9552C62.6164 73.9277 68.8635 68.8008 73.2588 62.2228C77.654 55.6448 80 47.9112 80 40C80 34.7471 78.9654 29.5457 76.9552 24.6927C74.945 19.8396 71.9986 15.4301 68.2843 11.7157C64.5699 8.00138 60.1604 5.05501 55.3073 3.04482C50.4543 1.03463 45.2529 0 40 0ZM32 58V22L56 40L32 58Z"
                fill="white" />
            </svg>
          </button>

          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path
              d="M12 0C9.62663 0 7.30655 0.703788 5.33316 2.02236C3.35977 3.34094 1.8217 5.21508 0.913451 7.4078C0.00519941 9.60051 -0.232441 12.0133 0.230582 14.3411C0.693605 16.6689 1.83649 18.807 3.51472 20.4853C5.19295 22.1635 7.33115 23.3064 9.65892 23.7694C11.9867 24.2324 14.3995 23.9948 16.5922 23.0865C18.7849 22.1783 20.6591 20.6402 21.9776 18.6668C23.2962 16.6934 24 14.3734 24 12C24 10.4241 23.6896 8.8637 23.0866 7.4078C22.4835 5.95189 21.5996 4.62902 20.4853 3.51472C19.371 2.40041 18.0481 1.5165 16.5922 0.913445C15.1363 0.310389 13.5759 0 12 0ZM9.6 17.4V6.6L16.8 12L9.6 17.4Z"
              fill="white" />
          </svg>
          <div class="gred-overlay"></div>
        </div>
        <div class="content p-5 col-md-7 d-flex align-items-center">
          <div class="bg-dark-blue d-flex flex-column justify-around">
            @if (get_sub_field('description'))
            <p class="text-white font-24">{{get_sub_field('description')}}</p>
            @endif

            @if (get_sub_field('name'))
            <h1 class="text-green font-18 font-weight-700">{{get_sub_field('name')}}</h1>
            @endif
            @if (get_sub_field('sub_title'))
            <h1 class="text-white font-15 font-weight-300 my-2">{{get_sub_field('sub_title')}}</h1>
            @endif
            @php($count = get_sub_field('rate'))
            @if ($count)
            <div>
              @for ($i = 1; $i <= 5; $i++) <span @class(["fa-star text-white", "far"=> $i >= $count , "fa checked"=> $i
                <= $count])></span>
                  @endfor
            </div>
            @endif
          </div>
        </div>
      </div>

    </div>
    @endif
    @endwhile
  </div>
</section>
<section class="avatar-slider bg-f4f6f9 mt-5 py-5">
  <div class="slider  container slider_2_sync owl-carousel owl-theme my-3">
    @while (have_rows('avatars_slider')) @php(the_row())

    <a href="#hash-{{get_row_index()}}" class="d-inline-block slider-item banner-bg-4 position-relative"
      data-hash="hash-{{get_row_index()}}">
      <div @class(['gred-overlay'=> get_sub_field('active_overlay'), 'h-100'])>
        <div class="container-fluid p-0 h-100">
          <div class="slider-content h-100 position-relative">
            @if(get_sub_field("slider_type") == 'image')
            <div class="img" style="background-image: {{ get_sub_field('image') ? " url(". get_sub_field('image')['url']
              . ")" : '' }}" alt=""></div>
            @elseif(get_sub_field("slider_type") == 'video')
            <video class="w-100 h-100 object-fit-cover" muted src="<?= get_sub_field(" video_upload")['url'] ?>">
              <source type="video/mp4" />
            </video>
            <svg class="play-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
              fill="none">
              <path
                d="M12 0C9.62663 0 7.30655 0.703788 5.33316 2.02236C3.35977 3.34094 1.8217 5.21508 0.913451 7.4078C0.00519941 9.60051 -0.232441 12.0133 0.230582 14.3411C0.693605 16.6689 1.83649 18.807 3.51472 20.4853C5.19295 22.1635 7.33115 23.3064 9.65892 23.7694C11.9867 24.2324 14.3995 23.9948 16.5922 23.0865C18.7849 22.1783 20.6591 20.6402 21.9776 18.6668C23.2962 16.6934 24 14.3734 24 12C24 10.4241 23.6896 8.8637 23.0866 7.4078C22.4835 5.95189 21.5996 4.62902 20.4853 3.51472C19.371 2.40041 18.0481 1.5165 16.5922 0.913445C15.1363 0.310389 13.5759 0 12 0ZM9.6 17.4V6.6L16.8 12L9.6 17.4Z"
                fill="white" />
            </svg>
            @endif
          </div>
        </div>
      </div>
    </a>
    @endwhile
  </div>
</section>
@endif

@php($btn = get_field('button'))

@if($btn)
<div class="d-flex justify-content-center my-2">
  <a class="default-btn btn" href="{{$btn['link'] ?? ''}}" target="{{$btn['target'] ?? ''}}">
    {{$btn['title'] ?? ''}}
  </a>
</div>
@endif

<!--End Banner Area-->
@php($count = 0)
@while (have_rows('avatars_slider')) @php(the_row())
@if(get_sub_field("slider_type") == 'video')
@php($count++)
<!-- Modal -->
<div class="modal fade" id="v-{{$count}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content border-0">
      <!-- <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> -->
      <div class="modal-body p-0">
        <video class="w-100 h-100 object-fit-cover" muted autoplay controls src="<?= get_sub_field("
          video_upload")['url'] ?>">
          <source type="video/mp4" />
        </video>
      </div>
    </div>
  </div>
</div>
@endif
@endwhile
