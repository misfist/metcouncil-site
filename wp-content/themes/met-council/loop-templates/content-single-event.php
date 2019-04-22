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
                $date_format = ( eo_is_all_day( $post->ID ) ? get_option( 'date_format' ) : get_option( 'date_format' ) . ', ' . get_option( 'time_format' ) );
            ?>

            <?php if( eo_recurs() ) : ?>

                <?php $occurrence = eo_get_next_occurrence_of( $post->ID );  ?>

                <?php echo eo_get_the_start( $date_format, $post->ID, $occurrence['occurrence_id'] ); ?> <span class="separator start-end">-</span>
                <?php echo eo_get_the_end( get_option( 'time_format' ), $post->ID, $occurrence['occurrence_id'] ); ?>
            
            <?php else : ?>

            <?php echo eo_get_the_start( $date_format, $post->ID ); ?> <span class="separator start-end">-</span>
                <?php echo eo_get_the_end( get_option( 'time_format' ), $post->ID, $occurrence['occurrence_id'] ); ?>

            <?php endif; ?>

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
