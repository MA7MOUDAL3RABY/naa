<footer class="content-info">
  <nav class="navbar fixed-bottom">
    <div class="container d-flex">
      <div class="d-flex align-items-center gap-3 flex-grow-0">
        @while (have_rows('social_networks', 'option')) @php(the_row())
        <a target="{{get_sub_field('icon_link')['target'] ?? ''}}" href="{{get_sub_field('icon_link')['url'] ?? '#'}}"
          title="{{get_sub_field('icon_name')}}">
          <img src="{{get_sub_field('icon_image')}}" alt="{{ get_field('icon_name') }}">
        </a>
        @endwhile
      </div>
      <div class="flex-grow-1 px-3">
        <div class="line point-end">
        </div>
      </div>
    </div>
  </nav>
</footer>
