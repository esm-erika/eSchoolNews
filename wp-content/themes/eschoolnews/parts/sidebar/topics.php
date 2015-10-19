<article>
	<h3 class="section-title"><span>Topics</span></h3>

	<?php $archive_tags = post_type_tags( 'ercs', 'whitepapers' );

	foreach( $archive_tags as $tag ) {
		echo '<span class="tag"><a href="' . get_tag_link( $tag->term_id ). '">' . esc_html( $tag->name ) . '</a></span>';
		} ?>
</article>