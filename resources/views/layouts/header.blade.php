<header class="header container">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('/')}}">
        @if(get_field('light_logo', 'option') && get_field('dark_logo', 'option'))
        <img class="light-logo" src="{{get_field('light_logo', 'option')}}" alt="{{$siteName}}">
        <img class="dark-logo" src="{{get_field('dark_logo', 'option')}}" alt="{{$siteName}}">
        @else
        <img class="main-logo" src="{{get_field('website_logo', 'option')}}" alt="{{$siteName}}">
        @endif
      </a>

      <div id="toggle-dark-mode">
        <span class="dark-btn" title="dark Mode">
          <svg xmlns="http://www.w3.org/2000/svg" fill="#e51724" width="30px" height="30px" viewBox="0 0 35 35"
            data-name="Layer 2" id="Layer_2">
            <script xmlns="" />
            <g id="SVGRepo_bgCarrier" stroke-width="0" />
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
            <g id="SVGRepo_iconCarrier">
              <path
                d="M18.44,34.68a18.22,18.22,0,0,1-2.94-.24,18.18,18.18,0,0,1-15-20.86A18.06,18.06,0,0,1,9.59.63,2.42,2.42,0,0,1,12.2.79a2.39,2.39,0,0,1,1,2.41L11.9,3.1l1.23.22A15.66,15.66,0,0,0,23.34,21h0a15.82,15.82,0,0,0,8.47.53A2.44,2.44,0,0,1,34.47,25,18.18,18.18,0,0,1,18.44,34.68ZM10.67,2.89a15.67,15.67,0,0,0-5,22.77A15.66,15.66,0,0,0,32.18,24a18.49,18.49,0,0,1-9.65-.64A18.18,18.18,0,0,1,10.67,2.89Z" />
            </g>
            <script xmlns="" />
          </svg>
        </span>
        <span class="light-btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24" fill="none">
            <script xmlns="" />
            <g id="SVGRepo_bgCarrier" stroke-width="0" />
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
            <g id="SVGRepo_iconCarrier">
              <g clip-path="url(#a)" stroke="#e51724" stroke-width="1.5" stroke-miterlimit="10">
                <path
                  d="M5 12H1M23 12h-4M7.05 7.05 4.222 4.222M19.778 19.778 16.95 16.95M7.05 16.95l-2.828 2.828M19.778 4.222 16.95 7.05"
                  stroke-linecap="round" />
                <path d="M12 16a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" fill="#e51724" fill-opacity=".16" />
                <path d="M12 19v4M12 1v4" stroke-linecap="round" />
              </g>
              <defs>
                <clipPath id="a">
                  <path fill="#ffffff" d="M0 0h24v24H0z" />
                </clipPath>
              </defs>
            </g>
            <script xmlns="" />
          </svg>
        </span>
      </div>

      {{--
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>

        @if (has_nav_menu('primary_menu'))
        <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_menu') }}">
      {!! wp_nav_menu([
      'theme_location' => 'primary_menu',
      'menu_class' => 'navbar-nav',
      'walker' => new Custom_Walker_Nav_Menu()
      ]) !!}
  </nav>
  @endif

  </div> --}}
  </div>

  </nav>

</header>
