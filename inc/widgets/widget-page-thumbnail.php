<?php
/**
 * Image overlay widget general class
 * which extends the WP_Widget class.
 */
class Page_Thumbnail extends WP_Widget
{
	/**
	 * widget slug for text-domain and prefixing.
	 * @var string
	 */
	protected $widget_slug = 'thubmnail-page';

	/**
	 * register widget with wordpress
	 * using parent constructor from WP_Widget class.
	 */
	public function __construct() {
		$widget_options = array(
			'classname' => $this->get_widget_slug().'-class',
			'description' => __( 'This widget display page with thumbnail.', $this->get_widget_slug() )
		);
		parent::__construct(
			$this->get_widget_slug(), 									// id
			__( 'Thumbnail Page', $this->get_widget_slug() ), 	// name
			$widget_options 											// args
		);
	}

	/**
	 * return the widget slug.
	 * @return string 
	 */
	public function get_widget_slug() {
		return $this->widget_slug;
	}

	/**
	 * front-end display of the widget
	 * 
	 * @param  $args		widget arguments
	 * @param  $instance	saved values from database
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
        $page_id = apply_filters( 'page_thumbani_page_id', $instance['page_id'] );
        $thumbnail_size = apply_filters( 'page_thumbani_thumbnail_size', $instance['thumbnail_size'] );

		echo $before_widget;

		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		
		$wp_query = new WP_Query( array( 'page_id' => $page_id ) );
		if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

				<div class="text-center page-thumbnail-widget--content circle-hover">
				    <?php
					if ( has_post_thumbnail()) {
						the_post_thumbnail( $thumbnail_size, array( 'class' => 'img-center img-circle img-responsive' ) );
					}?>
				</div>
			    <?php the_title( '<div class="row"><div class="col-md-10 col-md-offset-1 text-center"><h3 class="page-thumbnail-title"><a href="'.get_the_permalink().'">', '</a></h3></div></div>' ); ?>

			<?php endwhile;
		endif;
		wp_reset_query();
		
		echo $after_widget;
	}

	/**
	 * sanatize widget form valuse as they are saved
	 * 
	 * @param  array $new_instance 	new valuse sent to be saved.
	 * @param  array $old_instance 	old saved valuse in the database.
	 * 
	 * @return array 				safe values ready to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		// image overlay title
		$instance['title'] = strip_tags( $new_instance['title'] );
		// image overlay page id
        $instance['page_id'] = strip_tags($new_instance['page_id']);
        // thumbnail size
        $instance['thumbnail_size'] = strip_tags($new_instance['thumbnail_size']);
		

		return $instance;
	}

	/**
	 * back-end display of the widget.
	 * 
	 * @param  array $instance 	prevoisly saved valuse in the database.
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Featured Image', $this->get_widget_slug() );
		}

		// page id
		if ( isset( $instance['page_id'] ) ) {
			$page_id = $instance['page_id'];
		} else {
			$page_id = '';
		}

		// thumbnail size
		if ( isset( $instance['thumbnail_size'] ) ) {
			$thumbnail_size = $instance['thumbnail_size'];
		} else {
			$thumbnail_size = 'large';
		}
	?>
		<!-- panel title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', $this->get_widget_slug() ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'page_id' ); ?>"><?php _e( 'Page:', $this->get_widget_slug() ); ?></label>
	        <?php
				wp_dropdown_pages(array(
				    'id' => $this->get_field_id('page_id'),
				    'name' => $this->get_field_name('page_id'),
				    'selected' => $page_id,
				));
	        ?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'thumbnail_size' ); ?>"><?php _e( 'Image Size:', $this->get_widget_slug() ) ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'thumbnail_size' ); ?>" name="<?php echo $this->get_field_name( 'thumbnail_size' ); ?>"><?php
				$image_sizes = get_intermediate_image_sizes();
				foreach ( $image_sizes as $image_size ) {
					$image_size_name = ucwords(str_replace( '-', ' ', $image_size));
					echo '<option value="' . $image_size  . '" id="' . $image_size  . '"', $thumbnail_size == $image_size  ? ' selected="selected"' : '', '>', $image_size_name , '</option>';
				}
			?></select>
		</p>

	<?php
	}

}

/**
 * register widget to widgets_init hook.
 */
add_action( 'widgets_init', function() {
	register_widget( 'Page_Thumbnail' );
});