<?php wp_head(); ?>
<?php get_header() ?>
<body>
    <header>
        <h1 class="logo">tekupaku</h1>
    </header>
    <?php
		if(have_posts()) :
			while(have_posts()) :
			the_post();
			get_template_part('contents');
			endwhile;
		endif;
		
		?>
    <?php get_footer(); ?>
    <?php wp_footer(); ?>
</body>
</html>