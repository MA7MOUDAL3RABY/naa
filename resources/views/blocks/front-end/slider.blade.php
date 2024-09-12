@if(have_rows('content'))
<div id="theme-slider" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    @while (have_rows('content')) @php(the_row())
    <div class="carousel-item">
      {{get_sub_field('title')}}
      <img src="{{get_sub_field('image')['url'] ?? ''}}" class="d-block w-100" alt="...">
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
