<?php 
/** Individual Mod Template for Wario Land 4 Mod Repository **/
get_header();
?>
<div class="mb-4" id="list">
<?php
    while(have_posts()): the_post();
        $story_id = get_the_ID();
        $difficulty = get_post_meta($story_id, 'difficulty', true);
        switch($difficulty){
            case('easy'):
                $badge = '<span class="badge badge-pill badge-primary badge-easy">'.ucfirst($difficulty).'</span>';
            break;
            case('normal'):
                $badge = '<span class="badge badge-pill badge-primary badge-medium">'.ucfirst($difficulty).'</span>';
            break;
            case('hard'):
                $badge = '<span class="badge badge-pill badge-primary badge-hard">'.ucfirst($difficulty).'</span>';
            break;
        }
        $progress = get_post_meta($story_id, 'progress', true);
        $rating = get_post_meta($story_id, 'rating', true);
        if(!isset($rating) || empty($rating)){
            $rating_text = 'Rating: 0/5';
        }
        else {
            $rating_text = 'Rating: '.$rating.'/5';
        }
        $tags = wp_get_post_tags($story_id);
?>
    <article class="hack shadow-sm p-3 mb-3 bg-white rounded">
        <div class="row">
            <div class="col">
                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <?php 
                    $gallery_images = get_field('screenshots');
                    if($gallery_images):
                ?>
                    <div id="carouselExampleControls-i0" class="carousel slide" data-interval="false">
                        <div class="carousel-inner">
                <?php
                        $counter = 0;
                        foreach($gallery_images as $image):
                            if($counter == 0){
                                $item_class = 'carousel-item active';
                            }
                            else {
                                $item_class = 'carousel-item';
                            }
                ?>
                        <div class="<?php echo $item_class; ?>">
                            <img src="<?php echo $image['sizes']['medium']; ?>" class="d-block image" alt="<?php echo $image['alt']; ?>">
                        </div>
                <?php
                        $counter += 1;
                        endforeach;
                ?>
                        </div>
                    </div>
                <?php
                    endif;
                    echo '<!--'; print_r($gallery_images); echo '-->';
                ?>

                <div id="carouselExampleControls-i0" class="carousel slide" data-interval="false">
                    <a class="carousel-control-prev" href="#carouselExampleControls-i0" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"> </span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleControls-i0" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                </div>
            </div>
            <div class="col-sm-5">
                <p> Creator: <?php the_author(); ?> <br>Date Submitted: <?php echo get_the_date(); ?></p>
                Difficulty: <?php echo $badge; ?>
                <p><?php the_excerpt(); ?></p>
            </div>
            <div class="col-sm-4">
                <progress class="progress-bar bg-info" max="100" value="<?php echo $progress; ?>"><?php echo $progress.'%'; ?></progress>
                <p><?php echo $rating_text; ?></p>
                <a id="btn-download" class="btn btn-primary float-right btn-lg" href="./Hacks/versusKleyman.ips" role="button">Download</a>
            </div>
        </div>
        <?php if(isset($tags) && !empty($tags)): ?>
            <div class="row">
                <div class="col">
                    <?php echo 'Tags: '; ?>
                    <ul class="tags-list">
                        <?php 
                            foreach($tags as $tag): 
                                $tag_link = get_tag_link($tag->term_id)
                        ?>
                            <li><a href="<?php echo $tag_link; ?>"><?php echo $tag->name.', '; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-sm-8">
                <?php 
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                ?>
            </div>
        </div>
    </article>
<?php 
    endwhile; 
    get_footer();
?>