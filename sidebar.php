<aside>
	<?php if ( is_dynamic_sidebar()  ) { 
		dynamic_sidebar( 'right_nonprofit' ); 		
	} 
	else{ /*If sidebar no active display next widget */
		$args = array(
					'before_widget' => '<div class="nonprofit-widget"><div class="widget">',
					'after_widget' 	=> '</div><div class="nonprofit-border-bottom" ></div></div>',
					'before_title' 	=> '<h4>',
					'after_title' 	=> '</h4><div class="title-botom"></div>'
					);					
		the_widget( 'WP_Widget_Meta', 'title', $args );
		the_widget( 'WP_Widget_Calendar','title',  $args );
		the_widget( 'WP_Widget_Search','title', $args );
	}?>
	<div class="nonprofit-clear"></div>		
</aside>
