<ul class="menu-social">

	<?php 
	wp_nav_menu( array(
		'container'			=> '', 
		'depth'				=> 1,
		'fallback_cb'		=> '',
		'items_wrap'		=> '%3$s',
		'link_before'		=> '<span class="screen-reader-text">',
		'link_after'		=> '</span>',
		'menu_class'		=> 'menu-items',
		'menu_id'			=> 'menu-social-items',
		'theme_location'	=> 'social',
	) );
	?>

</ul><!-- .menu-social -->