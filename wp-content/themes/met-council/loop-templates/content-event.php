<?php  ?>

<article <?php post_class(); ?> id="<?php the_ID(); ?>">

  <header class="entry-header">
    <h3 class="event-title"><a href="<?php echo get_permalink(); ?>" title="<?php echo esc_attr( the_title() ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
  </header>

  <div class="entry-content">
    <div class="event-date">
      <?php echo eo_get_the_start( get_option( 'date_format' ) ); ?>
    </div>
    <div class="event-time">
      <span class="time-start"><?php echo eo_get_the_start( get_option( 'time_format' ) ); ?></span>
      <span class="separator"></span>
      <span class="time-end"><?php echo eo_get_the_end( get_option( 'time_format' ) ); ?></span>
    </div>

    <?php if( $location_id = eo_get_venue() ): ?>
      <div class="event-location">
        <div class="location-name">
          <?php eo_venue_name( $location_id ); ?>
        </div>

        <?php if( $location_address =  eo_get_venue_address( $location_id ) ) : ?>
          <span class="separator"></span>
          <div class="location-address">
            <span class="address-street"><?php echo  $location_address['address'] ?></span>
            <span class="separator"></span>
            <span class="address-city"><?php echo  $location_address['city'] ?></span>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

  </div>

  <footer class="entry-footer"></footer>

</article>
