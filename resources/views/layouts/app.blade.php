<!--
|=============================================================================================|
|        _        _              _        ___________         _        _______      _      _  |
|       / \      | |            / \      |  ________ \       / \      |  ____ \    | |    | | |
|      / ^ \     | |           / ^ \     | |        \ \     / ^ \     | |    \ \   | |    | | |
|     / /_\ \    | |          / /_\ \    | |________/ /    / /_\ \    | |____/ /   | |____| | |
|    / _____ \   | |         / _____ \   |  _______  /    / _____ \   |  _____  \  |______  | |
|   / /     \ \  | |______  / /     \ \  | |       \ \   / /     \ \  | |____/  / ________| | |
|  /_/       \_\ |_______/ /_/       \_\ |_|        \_\ /_/       \_\ |________/  \_________| |
|                                                                                             |
|=============================================================================================|
|===================================== https://alaraby.dev ===================================|
|=============================================================================================|
  Theme Name:         theme
  Theme URI:          https://alaraby.dev
  Description:        WP Sage 10 with Vite Starter theme
  Version:            1.0.0
  Author:             Mahmoud Araby
  Author URL:         https://alaraby.dev
  Text Domain:        theme
  Requires PHP:       8.2
-->
<!doctype html>
<html @php(language_attributes())>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet" />
  <link rel="icon" href="{{get_field('light_favicon', 'option')}}" />
  @yield('head')
  <link rel="stylesheet" href="{{ asset('build/main.css') }}">
  @php(do_action('get_header'))
  @php(wp_head())
</head>

<body @php(body_class())>
  @php(wp_body_open())

  <div id="app" style="background-image: url({{get_field('default_image', 'option')}})">
    @include('layouts.header')

    <main id="main" class="main">
      @yield('content')
    </main>

    @hasSection('sidebar')
    <aside class="sidebar">
      @yield('sidebar')
    </aside>
    @endif

    @include('layouts.footer')
  </div>

  @yield('body')
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
  <script type="text/javascript" src="https://cdnc.heyzine.com/release/jquery.pdfflipbook.4.js"></script>
  <script src="{{ asset('build/main.js') }}" defer></script>

  @php(do_action('get_footer'))
  @php(wp_footer())
</body>

</html>
