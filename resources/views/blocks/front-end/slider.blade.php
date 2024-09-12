@if(have_rows('content'))
<div id="theme-slider" class="carousel slide border-2" data-bs-ride="carousel">
  <div class="carousel-inner">
    @php($first = true)
    @while (have_rows('content')) @php(the_row())
    <div class="carousel-item @if($first) active @php($first = false) @endif">
      {{ get_sub_field('title') }}
      @if(get_sub_field('image'))
      <img src="{{ get_sub_field('image')['url'] ?? '' }}" class="d-block h-100" alt="{{ get_sub_field('title') }}">
      @endif
    </div>
    @endwhile
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
