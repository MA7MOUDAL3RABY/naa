@if(have_rows('content'))
<div id="theme-slider" class="carousel slide border-2 bg-secondary-dark" data-bs-ride="carousel">
  <div class="carousel-inner overflow-y-hidden">
    <div class="container">
      @php($first = true)
      @while (have_rows('content')) @php(the_row())
      @if(get_sub_field('image'))
      <div class="carousel-item @if($first) active @php($first = false) @endif">
        <img style="max-height: 500px" draggable="false" src="{{ get_sub_field('image')['url'] ?? '' }}"
          class="d-block mx-auto object-cover" alt="{{ get_sub_field('title') }}">
      </div>
      @endif
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
