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
    @php(do_action('get_header'))
    @php(wp_head())
  </head>

  <body @php(body_class())>
    @php(wp_body_open())

    <div id="app">
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

    @php(do_action('get_footer'))
    @php(wp_footer())
  </body>
</html>
