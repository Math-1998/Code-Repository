<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-each' ); ?>>
	<div class="entry-title"><h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2></div>
	<div class="entry-content">
		<?php the_excerpt();?>
	</div>
</article>