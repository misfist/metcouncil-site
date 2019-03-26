<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 * @subpackage metcouncil
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <div class="event-date">
            <?php
                //Formats the start & end date of the event
                echo eo_format_event_occurrence();
            ?>
        </div>
    </header>


    <div class="entry-content">

        <?php the_content(); ?>

    </div><!-- .entry-content -->

    <footer class="entry-footer">

        <div class="entry-meta">
            <?php echo get_the_term_list( $post->ID, 'event-category', '<ul class="category"><li>', ',</li><span class="separator"></span><li>', '</li></ul>' ); ?>
        </div>

        <?php understrap_entry_footer(); ?>

    </footer><!-- .entry-footer -->

</article><!-- #post-## -->
