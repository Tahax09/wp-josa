<?php
/**
 * Instagram Widget Class
 */
class Instagram_widget extends WP_Widget {

  function Instagram_widget() {
    parent::WP_Widget(false, $name = 'Instagram images Widget');
  }

  function widget($args, $instance) {
    extract( $args );
    $query = new WP_Query(array(
      'post_type' => 'instagram',
      'post_status' => 'publish',
      'posts_per_page' => 6
    ));

    echo $before_widget;
    if ($query->have_posts()) {
      $this->drawImages($query);
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

  function drawImages($query) {
    ?>
    <div class="instagram-container">
      <div class="row">
        <div class="col-8">
          <img src="<?php echo $this->getNextPostImage($query); ?>" />
        </div>

        <div class="col-4">
          <div class="col-12">
            <img src="<?php echo $this->getNextPostImage($query); ?>" />
          </div>
          <div class="col-12">
            <img src="<?php echo $this->getNextPostImage($query); ?>" />
          </div>
        </div>
      </div> <?php // row end ?>
      <div class="row">
        <div class="col-4">
          <img src="<?php echo $this->getNextPostImage($query); ?>" />
        </div>
        <div class="col-4">
          <img src="<?php echo $this->getNextPostImage($query); ?>" />
        </div>
        <div class="col-4">
          <img src="<?php echo $this->getNextPostImage($query); ?>" />
        </div>
      </div> <?php // row end ?>
    </div>

    <?php
  }

  function getNextPostImage($query) {
    $query->the_post();
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
    return $image[0];
  }
} // end class instagram_widget

add_action('widgets_init', create_function('', 'return register_widget("instagram_widget");'));
