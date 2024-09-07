<!--Start Banner Area-->
<section class="banner">
  <div class="banner-area">
    @if(have_rows('slider_content'))
    <div class="slider hero-slider2 owl-carousel owl-theme">
      @php($count = 0)
      @while (have_rows('slider_content') && $count < 1) @php(the_row())
      {{ $count++ }}
      <div class="slider-item banner-bg-4 position-relative" style="background: {{ get_sub_field('image') ? " url(".
        get_sub_field('image')['url'] . ")" : get_sub_field('background_color') ?? '' }}">
        <div @class(['gred-overlay'=> get_sub_field('active_overlay')])>
          <div class="container-fluid">
            <div class="slider-content">
              @if (get_sub_field('title'))
              <h1 style="color: {{get_sub_field('content_color') ?? ''}}">{{get_sub_field('title')}}</h1>
              @endif

              @if (get_sub_field('description'))
              <p style="color: {{get_sub_field('content_color') ?? ''}}">{{get_sub_field('description')}}</p>
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
  <div class="bottom-bar bg-blue pt-3 pb-4">
    <div class="d-flex justify-content-center align-items-center gap-2 pb-2">
      <div class="text cursor-pointer" x-data
        @click.prevent="scrollTo(0, document.getElementById('{{get_field('scroll_id')}}').offsetTop)">
        Explore Must
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="30" viewBox="0 0 16 30" fill="none">
        <path d="M16 14.7425L16 9.59961L8 15.3139L0 9.59961L-2.24801e-07 14.7425L8 20.4568L16 14.7425Z" fill="white" />
      </svg>
    </div>
  </div>
</section>
<!--End Banner Area-->
