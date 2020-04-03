<?php
/**
 * The default template for displaying content on page builders templates.
 * Used for page builders.
 * @package Moderne
 */ 
 ?>
 
<article id="post-<?php the_ID(); ?>" class="section pagebuilder-section">
	<?php the_content(); ?>
</article>
