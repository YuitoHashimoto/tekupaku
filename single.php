<?php wp_head(); ?>
<?php get_header() ?>
    <main class="articleDetail">
        <section class="content">
            <h2 class="content__title"><?php the_title() ?></h2>
            <p class="content__date">更新日:<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('y/m/d'); ?></time></p>
            <?php 
                $imgUrl = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), ‘full’);
            ?>
            <div class="content__img" style="background-image:url(<?php echo $imgUrl[0]?>)"></div>
            <?php if(have_posts()): ?>
                <?php while( have_posts() ) : the_post(); ?>
            <section class="content__textarea content__fontstyle">
                <?php the_content() ?>
            </section>
            <!-- <section <?php post_class( "content__paragraph" ); ?>>
                <h3 class="content__paragraph__heading"></h3>
            </section> -->
                <?php endwhile ;?>
            <?php endif ;?>
            <section class="content__producer">
				<?php
					$user = get_the_author_meta('user_email');

					if ( $user ) :
				?>
                	<div class="content__producer__img" style="background-image:url(<?php echo esc_url( get_avatar_url( $user ) ); ?>)"></div>
				<?php endif; ?>	
                <div class="content__producer__profile">
                    <p class="content__producer__profile__heading">
                        <small>記事の製作者</small>
                    </p>
                    <p class="content__producer__profile__name">
                        <strong><?php the_author(); ?></strong>
                    </p>
                    <p class="content__producer__profile__text">
                        <?php the_author_meta('user_description'); ?>
                    </p>
                </div>
            </section>
        </section>
        <section class="articleLink">
            <a href="#" class="articleLink__before">
                <img src="<?php echo get_template_directory_uri(); ?>/img/navigate_before-orenge.svg" alt="前の記事右矢印アイコン">
                前の記事
            </a>
            <a href="/list" class="articleLink__list">記事の一覧</a>
            <a href="#" class="articleLink__next">
                次の記事
                <img src="<?php echo get_template_directory_uri(); ?>/img/navigate_next-orenge.svg" alt="次の記事左矢印アイコン">
            </a>
        </section>
        <section class="advertising">
            <div class="advertising__area">広告</div>
        </section>
    </main>

    <?php get_footer(); ?>
    <?php wp_footer(); ?>
</body>
</html>