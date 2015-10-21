<article>
			<h4>Popular Resource Topics</h4>
			<br/>

	<ul style="margin: 0;">

	<?php $archive_tags = post_type_tags( 'ercs', 'whitepapers' );

	foreach( $archive_tags as $tag ) {
		echo '<h5><a href="' . get_tag_link( $tag->term_id ). '">' . esc_html( $tag->name ) . '</a></h5>';
		} ?>

	</ul>
</article>