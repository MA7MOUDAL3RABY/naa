<header class="header">


  @if (has_nav_menu('primary_menu'))
    <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_menu') }}">
      {!! wp_nav_menu(['theme_location' => 'primary_menu', 'menu_class' => 'nav', 'echo' => false]) !!}
    </nav>
  @endif
</header>
