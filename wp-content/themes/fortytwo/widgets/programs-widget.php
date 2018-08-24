<?php
/**
 * programs Widget Class
 */
class Programs_widget extends WP_Widget {

  function programs_widget() {
    parent::WP_Widget(false, $name = 'Programs images Widget');
  }

  function widget($args, $instance) {
    extract( $args );
    $terms = get_terms('programs', array(
      'hide_empty' => true,
    ));

    usort($terms, function($a, $b) {
      if (function_exists('get_field')) {
        return get_field('order', $a) - get_field('order', $b);
      }

      return 0;
  });

    echo $before_widget;
    foreach ($terms as $term): ?>
      <div class="row mb-5 programs-posts-entry">
        <div class="col-3">
         <?php
          $image = function_exists('get_field') ? get_field('image', $term) : [];
          if (!empty($image) && $image['url']) : ?>
            <img src="<?= $image['url'] ?>" alt="<?= $term->name ?>">
          <?php endif; ?>
        </div>
        <div class="col-9">
          <h5 class="mb-4 text-break text-info">
            <?= $term->name ?>
          </h5>
          <div>
            <?= $term->description ?>
          </div>
          <a href="<?= get_term_link($term->term_id) ?>" class="mt-4 btn btn-outline-secondary">
            <?=  __( 'KNOW MORE', 'fortytwo' ) ?>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
    <?php
    echo $after_widget;
  }

  /** @see WP_Widget::update */
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    return $instance;
  }

  /** @see WP_Widget::form */
  function form($instance) {
  }
} // end class programs_widget

add_action('widgets_init', create_function('', 'return register_widget("programs_widget");'));
