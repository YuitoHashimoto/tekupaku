<?php
/*
Template Name: Archive
*/
?>
<?php wp_head(); ?>
<?php get_header() ?>
<main class="articleListMain">
        <!-- 1投稿 -->
        <h2 class="title">記事一覧</h2>
        <section class="articleBox">
            <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                global $post;
                $tag_posts = get_posts(array(
                'post_type' => 'post', // 投稿タイプ
                'paged' => $paged,// 現在のページ
                'posts_per_page' => 10, // 表示件数
                'orderby' => 'date', // 基準になる表示順
                'order' => 'DESC' // 昇順・降順
                ));
                if($tag_posts):
                foreach($tag_posts as $post):
                setup_postdata($post);
            ?>
            <article class="articleWrap">
                <a href="<?php the_permalink($id) ?><?php get_the_permalink(); ?>">
                    <?php 
                        $imgUrl = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), ‘full’);
                    ?>
                    <div class="articleWrap__img" style="background-image:url(<?php echo $imgUrl[0]?>)"></div>
                    <div class="articleWrap__information">
                        <h2 class="articleWrap__information__title">
                            <?php the_title(); ?>
                        </h2>
                        <time class="articleWrap__information__time"datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年n月j日'); ?></time>
                    </div>
                </a>
            </article>
            <?php endforeach; endif;
                // ループ後のリセット処理
                wp_reset_postdata();
            ?>
        </section>
        <!-- 1投稿 -->


         <!-- ページネーション -->
         <nav class="pageNavWrap">
             <!-- <p class="articlesNumber">
                 <span class="molecule">20件</span>/<span class="denominator">80件</span>
            </p> -->
            <div class="pageNav">
            <?php
                $args = array(
                    'mid_size' => 1,
                    'prev_text' => '&lt;&lt;前へ',
                    'next_text' => '次へ&gt;&gt;',
                    'screen_reader_text' => ' ',
                );
                the_posts_pagination($args);
            ?>
            </div>
         </nav>
         <!-- 広告 -->
         <div class="advertisingWarp">
            <div class="advertising">
                <h2>広告</h2>
            </div>
         </div>
         <!-- 広告 -->
    </main>
    <?php get_footer(); ?>
    <?php wp_footer(); ?>
</body>
</html>
