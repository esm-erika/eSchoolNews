<article>
	<ul style="margin: 0;">
		<h3 class="section-title"><span>Popular Resource Topics</span></h3>

	<?php $archive_tags = post_type_tags( 'ercs', 'whitepapers' );

	foreach( $archive_tags as $tag ) {
		echo '<h5><a href="' . get_tag_link( $tag->term_id ). '">' . esc_html( $tag->name ) . '</a></h5>';
		} ?>

	</ul>
</article>