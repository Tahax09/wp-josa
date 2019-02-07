<?php
/**
 * Social Widget Class
 */
class Social_widget extends WP_Widget {

  function Social_widget() {
    parent::WP_Widget(false, $name = 'Social images Widget');
  }

  function widget($args, $instance) {
    extract( $args );
    $query = new WP_Query(array(
      'post_type' => 'social',
      'category__in' => [13, 14], // Twitter, Facebook
      'post_status' => 'publish',
      'posts_per_page' => 3,
      'orderby' => 'ID',
      'order' => 'DESC'
    ));

    echo $before_widget;

    while ( $query->have_posts() ) :
      $query->the_post();
    ?>

      <div class="row my-4 social-posts-entry">
          <div class="col-12">
              <div class="media border-bottom">
                  <?php
                    $source_image = get_stylesheet_directory_uri() . '/img/';
                    $categories = get_the_category();
                    $source_image .= $categories[0]->slug === 'facebook-feed' ? 'fb.svg' : 'tw.svg';
                  ?>
                  <img class="mr-3 social-posts-entry-logo" src="<?= $source_image ?>" alt="<?= $categories[0]->name ?>">
                  <div class="media-body mb-4">
                      <p class="text-break">
                          <?= strip_tags(get_the_title()) ?>
                      </p>
                      <?php
                          $img = $this->getImage();
                      ?>
                      <?php if ($img) : ?>
                          <img class="mb-4 social-post-img" src="<?= $img ?>" aria-hidden />
                      <?php endif; ?>
                      <p class="text-black-50"><?= get_the_date() ?></p>
                  </div>
              </div>
          </div>
        </div>
    <?php endwhile; ?>

    <div class="row">
      <div class="col-12 justify-content-end d-flex">
        <a href="/?post_type=social" class="btn btn-outline-info"><?= __( 'All Updates', 'fortytwo' ) ?></a>
      </div>
    </div>
    <?php
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


  function getImage() {
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    return $image[0];
  }
} // end class Social_widget

add_action('widgets_init', create_function('', 'return register_widget("social_widget");'));
