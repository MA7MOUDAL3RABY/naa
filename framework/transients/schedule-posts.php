<?php
/**
* Function Name: theme publish scheduled interval - theme_publish_scheduled_interval();
* This Function can return Add transient for schedule post intervals set
* @param ()
* @return ( string )
*/
function theme_publish_scheduled_interval() {

  if (function_exists('get_field')) {
    $count_scheduled = get_field('count_scheduled', 'option');
  } else {
    $count_scheduled = "1000";
  }

  if (false === ( get_transient('theme_publish_scheduled_interval') )):
    theme_publish_scheduled_posts();
    set_transient('theme_publish_scheduled_interval', time(), 0.25 * HOUR_IN_SECONDS);
  endif;
  $remaining_time = $count_scheduled - (time() - get_transient('theme_publish_scheduled_interval'));
  // Check if remaining time is negative value or more than its value bug
  if ($remaining_time < -10 || $remaining_time  > $count_scheduled):
    theme_publish_scheduled_posts();
    set_transient('theme_publish_scheduled_interval', time(), 0.25 * HOUR_IN_SECONDS);
    $remaining_time = $count_scheduled - (time() - get_transient('theme_publish_scheduled_interval'));
  endif;
  return $remaining_time;
}
add_action('init', 'theme_publish_scheduled_interval');
/**
* Function Name: theme Publish scheduled posts - theme_publish_scheduled_posts();
* This Function can return Grab all scheduled posts and publish if due date
* @param  ()
* @return ()
*/
function theme_publish_scheduled_posts() {
  $args = array(
    'posts_per_page' => -1,
    'post_status' => 'future',
  );
  $future_posts = get_posts($args);
  foreach ($future_posts as $post):
    $post_id = $post->ID;
    $post_date = strtotime($post->post_date);
    if (current_time('timestamp') > $post_date):
      wp_publish_post($post_id);
    endif;
  endforeach;
}
/**
* Function Name: theme Admin bar scheduled - theme_admin_bar_scheduled();
* This Function can return Show remaining time to next scedule interval check
* @param  (type $wp_admin_bar)
* @return ()
*/
function theme_admin_bar_scheduled($wp_admin_bar) {
  $remaining_time = theme_publish_scheduled_interval();
  $args = array(
    'id' => 'theme-lang-schedule',
    'title' => '<span class="ab-icon dashicons-calendar-alt"></span> ' . $remaining_time . __(' Scheduled posts ', 'theme'),
    'href' => admin_url('edit.php'),
    'meta' => array(
      'class' => 'theme-lang-views',
    )
  );
  $wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'theme_admin_bar_scheduled', 100);
