<?php
function my_theme_setup() {
    add_theme_support('post-thumbnails');
  }
  add_action( 'after_setup_theme', 'my_theme_setup');

  // 投稿のアーカイブページを作成する
  function post_has_archive($args, $post_type)
  {
      if ('post' == $post_type) {
          $args['rewrite'] = true; // リライトを有効にする
          $args['has_archive'] = 'list'; // 任意のスラッグ名
      }
      return $args;
  }
  add_filter('register_post_type_args', 'post_has_archive', 10, 2);

//   pタグを自動生成しないようにする
add_filter('the_content', 'wpautop_filter', 9);
function wpautop_filter($content) {
	global $post;
	$remove_filter = false;
	$arr_types = array('post'); //適用させる投稿タイプを指定
	$post_type = get_post_type( $post->ID );
	if (in_array($post_type, $arr_types)) $remove_filter = true;
		if ( $remove_filter ) {
			remove_filter('the_content', 'wpautop');
			remove_filter('the_excerpt', 'wpautop');
		}
	return $content;
}

