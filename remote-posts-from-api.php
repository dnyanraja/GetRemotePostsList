<?php /**
 * Plugin Name: Get remote posts list
 * Plugin URI: http://webandseoguide.tk
 * Description: Get Recent Posts from Remote Wp site using Rest api
 * Version: 1.0.0
 * Author: Ganesh Veer
 * Author URI: 
 * License: GPL2
 **/

class Remote_Posts_List_Widget extends WP_Widget {

	public function __construct() {
		$widget_details = array(
			'classname' => 'remote-wp-posts-rest-api',
			'description' => 'Retrieve the list of Recent Posts from Remote Wp site using Rest api'
		);

		parent::__construct( 'remote-wp-posts-rest-api', 'Get Posts from Api', $widget_details );

	}

	public function form( $instance ) {
        $title = ( !empty( $instance['title'] ) ) ? $instance['title'] : '';
        $jsonurl    = esc_attr( $instance['jsonurl'] );
        $postlimit    = esc_attr( $instance['postlimit'] );
        ?>

        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>">Title: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'jsonurl' ); ?>">Json URL: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'jsonurl' ); ?>" name="<?php echo $this->get_field_name( 'jsonurl' ); ?>" type="text" value="<?php echo esc_attr( $jsonurl ); ?>" />
        </p>
         <p>
            <label for="<?php echo $this->get_field_name( 'postlimit' ); ?>">No. of posts: </label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'postlimit' ); ?>" name="<?php echo $this->get_field_name( 'postlimit' ); ?>" type="text" value="<?php echo esc_attr( $postlimit ); ?>" />
        </p>

        <?php
	}
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        
        $instance = array();

        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['jsonurl'] = $new_instance['jsonurl'];
        $instance['postlimit'] = $new_instance['postlimit'];
        
        return $instance;
    }

	public function widget( $args, $instance ) {

                 $response = wp_remote_get($instance['jsonurl']);
         
                  /*if(is_wp_error($response)) {
                        echo 'Error Response';
                       // return;
                    }*/

                    $posts = json_decode( wp_remote_retrieve_body( $response ) );

                    if( empty( $posts ) ) {
                        echo 'error post empty';
                        return;
                    }

                    echo $args['before_widget'];

                    if( !empty( $instance['title'] ) ) {
                        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title'];
                    }


                    if( !empty( $posts ) ) {
                        echo '<ul>';
                        $count = 0;
                        foreach( $posts as $post ) {                            
                             
                             echo '<li><a href="' . $post->link. '">' . $post->title->rendered . '</a> <span> Posted On T: ' . $post->date. '</span></li>';
                             
                             $count++;
                             if($count < $instance['postlimit'])
                                continue;
                             else
                                break;
                        }
                    echo '</ul>';
                    }

                    echo $args['after_widget'];
	}

}

add_action( 'widgets_init', function(){register_widget( 'Remote_Posts_List_Widget' ); });


?>