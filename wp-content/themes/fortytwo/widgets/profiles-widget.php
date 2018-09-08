<?php
/**
 * Profiles Widget Class
 */
class Profiles_widget extends WP_Widget {
  private $limit = 11;

  function Profiles_widget() {
    parent::WP_Widget(false, $name = 'Profiles images Widget');
  }

  function widget($args, $instance) {
    extract( $args );
    $query = new WP_User_Query(array(
      'role' => 'Member',
      'query_limit' => $this->limit,
      'orderby' => 'ID',
      'order' => 'DESC',
      'count_total' => true
    ));

    echo $before_widget;
    $users = $query->get_results();
    if (!empty($users)) {
      // $users = [$users[0],$users[0],$users[0],$users[0],$users[0],$users[0],$users[0],$users[0],$users[0],$users[0],$users[0],];
      $this->drawHtml($users, $query->get_total());
    }
    echo $after_widget;
    wp_reset_query();
  }

  /** @see WP_Widget::update */
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    return $instance;
  }

  /** @see WP_Widget::form */
  function form($instance) {
  }

  function drawHtml($users, $total) {
    ?>
    <div class="row profiles-container">
      <?php foreach ($users as $user):?>
          <a class="col-4 col-md-2 mb-3" href="<?= get_author_posts_url($user->ID) ?>" class="profile-img">
            <img src="<?= get_avatar_url($user->ID) ?>" alt="<?= $user_info->user_nicename?>">
          </a>
      <?php endforeach; ?>

      <?php if (true || $total - $this->limit > 0):?>
        <div class="col-4 col-md-2 d-flex align-items-center mb-3">
          <a class="all-users flex-fill text-center pt-3" href="/all-users">
            +<?= $total - $this->limit ?>
          </a>
        </div>
      <?php endif; ?>
    </div> <?php // row end ?>

    <?php
  }
} // end class Profiles_widget

add_action('widgets_init', create_function('', 'return register_widget("profiles_widget");'));
