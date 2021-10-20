<?php wp_head(); ?>
<?php get_header() ?>
    <main class="homeMain">
        <section class="slide">
            <?php $myposts = get_posts("post_type=post&orderby=deta&order=desc&posts_per_page=1"); ?>
            <a href="<?php echo get_permalink( $myposts[0] ); ?>" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/TOP_BANNER_PC.png)"></a>
        </section>
        <section class="newArticle">
            <h2 class="newArticle__head">新着記事</h2>
            <div class="newArticle__box">
            <?php
                query_posts('posts_per_page=3'); 
            ?>     
            <?php 
                if(have_posts()):
                    while(have_posts()): the_post();
            ?>
            <article class="newArticle__box__block">
                <a href="<?php the_permalink($id) ?><?php get_the_permalink(); ?>">
                    <?php 
                        $imgUrl = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), ‘full’);
                    ?>
                    <div class="newArticle__box__block__img" style="background-image:url(<?php echo $imgUrl[0]?>)">
                    </div>
                    <time class="newArticle__box__block__date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年n月j日'); ?></time>
                    <p class="newArticle__box__block__text"><?php the_title(); ?></p>
                </a>
            </article>
            <?php
                endwhile;
                endif;
                ?>
            </div>
            <a href="/list"><button class="newArticle__nextBtn">記事をもっと見る</button></a>
        </section>
        <aside class="advertisingWrap">
            <h3>広告</h3>
        </aside>
    </main>
    <?php get_footer(); ?>
    <?php wp_footer(); ?>