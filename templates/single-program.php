<?php

/**
 * The template for displaying all single programs
 * 
 *
 * @package alpha-tech
 *
 
 */

get_header();

while (have_posts()) {
    the_post(); ?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/alpha-college-library.jpg') ?>);"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?> </h1>
            <div class="page-banner__intro">
                <p>Replace This</p>
            </div>
        </div>
    </div>
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>"><i class="fa fa-home" aria-hidden="true"></i>Programs Home </a>
                <span class="metabox__main">

                    <?php the_title(); ?>
                </span>

            </p>
        </div>
        <div class="generic-content">
            <?php the_content(); ?>
            <?php
            //Shows posts where the event date is great than or equual to today's date.
            $today = date('Ymd');
            $args = array(
                'posts_per_page' => 4,
                "post_type" => "event",
                "meta_key" => "event_date",
                "orderby" => "meta_value_num",
                "order" => "ASC",
                "meta_query" => array(
                    array(
                        'key' => 'event_date',
                        'compare' => '>=',
                        'value' => $today,
                        'type' => 'numeric'
                    ),
                    array( //filtering on ACF - related
                        'key' => 'related_programs',
                        'compare' => 'LIKE',
                        'value' => '"' . get_the_ID() . '"'
                    )
                )
            );
            $homepageEvents = new WP_Query($args);
            if ($homepageEvents->have_posts()) {
                echo '<hr class="section-break">';
                echo '<h2 class="headline  headling--medium">Upcoming ' . get_the_title() . ' Events</h2>';
                while ($homepageEvents->have_posts()) {
                    $homepageEvents->the_post();
            ?>

                    <div class="event-summary">
                        <a class="event-summary__date event-summary__date t-center" href="<?php the_permalink(); ?>">
                            <span class="event-summary__month"> <?php
                                                                $eventDate = new DateTime(get_field('event_date'));
                                                                echo $eventDate->format('M');
                                                                ?>
                            </span>
                            <span class="event-summary__day"><?php

                                                                echo $eventDate->format('d');

                                                                ?></span>
                        </a>
                        <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h5>
                            <?php
                            if (has_excerpt()) {
                            ?>
                                <p><?php echo get_the_excerpt() ?><a href="<?php the_permalink(); ?>" class="nu gray"> Read more</a></p>
                            <?php
                            } else {
                            ?>
                                <p><?php echo wp_trim_words(get_the_content(), 12, null) ?><a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
            <?php }
                wp_reset_postdata();
            }
            ?>

        </div>
    </div>


<?php }

get_footer();

?>