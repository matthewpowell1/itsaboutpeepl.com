<?php /* Template Name: Talk */ ?>

<?php get_header(); ?>

<style type="text/css">.site-header .site-logo {
background: transparent url("https://itsaboutpeepl.com/wp-content/uploads/2021/02/peepl-eat-red.png") 50% 50% no-repeat;
background-size: contain;
}

.site-header .site-logo img {
visibility: hidden;
}</style>

<div class="wp-block-cover alignfull has-background-dim has-background-gradient has-red-to-orange-gradient-background pb-0" style="min-height:400px;">
    <div class="wp-block-cover__inner-container">
        <h2 class="alignfull has-text-align-center has-huge-font-size"><?php the_field('header'); ?></h2>
    </div> 
</div>

<?php 
$featured_restaurant = get_field('featured_restaurant');
if ( $featured_restaurant ): ?>
    <div class="wp-block-group alignwide my-0 " style="padding-top:60px; padding-bottom: 60px;">
        <div class="wp-block-group__inner-container">
                <h3 class="has-text-align-center"><?php echo $featured_restaurant['title'] ?></h3>
                <?php echo $featured_restaurant['audio'] ?>
                <p class="has-text-align-center"><?php echo $featured_restaurant['description'] ?></p>
        </div>
    </div>
<?php endif; ?>

<?php 
$featured_art = get_field('featured_art');
if ( $featured_art ): ?>
    <div class="wp-block-group alignfull is-style-default has-white-background-color has-background">
        <div class="wp-block-group__inner-container">
                <figure class="wp-block-image size-full shadow-lg rounded">
                <img loading="lazy" width="900" height="720" src="<?php echo esc_url($featured_art['image']); ?>" alt="" class="wp-image-244" sizes="(max-width: 600px) 100vw, 600px">
                </figure>
                <h3 class="has-text-align-center"><?php echo $featured_art['title']; ?></h3>
                <p class="has-text-align-center"><?php echo $featured_art['description']; ?></p>
        </div>
    </div>
<?php endif; ?>


<?php
$featured_music = get_field('featured_music');
if ( $featured_music ): ?>
<div class="wp-block-group alignfull my-0 " style="padding-top:60px; padding-bottom: 60px;">
    <div class="wp-block-group__inner-container">
        <div class="wp-block-columns alignwide">
            <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%">
                <figure class="wp-block-image size-full shadow-lg rounded">
                    <img loading="lazy" width="800" height="800" src="<?php echo $featured_music['image'] ?>" alt="" class="wp-image-243" sizes="(max-width: 800px) 100vw, 800px">
                </figure>
            </div>
            <div class="wp-block-column" style="flex-basis:66.66%">
                <h3><?php echo $featured_music['title'];?></h3>
                <p><?php echo $featured_music['description'];?></p>
                <div class="wp-block-buttons">
                    <div class="wp-block-button is-style-fill">
                        <a class="wp-block-button__link has-white-color has-red-to-orange-gradient-background has-text-color has-background" href="<?php echo $featured_music['spotify'];?>" style="border-radius:50px">Spotify</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php
$featured_podcasts = get_field('featured_podcasts');
if ( $featured_podcasts ): ?>
<div class="wp-block-group alignfull is-style-default has-white-background-color has-background">
    <div class="wp-block-group__inner-container">
        <h3 class="has-text-align-center"><?php echo $featured_podcasts['title']; ?></h3>
        <p class="has-text-align-center"><?php echo $featured_podcasts['text']; ?></p>
        <h3 class="has-text-align-center"><?php echo $featured_podcasts['podcast_1']['title']?></h3>
        <?php echo $featured_podcasts['podcast_1']['audio']?>
        <p><?php echo $featured_podcasts['podcast_1']['description']?></p>
        <h3 class="has-text-align-center"><?php echo $featured_podcasts['podcast_2']['title']?></h3>
        <?php echo $featured_podcasts['podcast_2']['audio']?>
        <p><?php echo $featured_podcasts['podcast_2']['description']?></p>
    </div>
</div>
<?php endif; ?>

<?php get_footer(); ?>