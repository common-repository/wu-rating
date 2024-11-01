<?php
/*
Plugin Name: Wu-Rating五星评级
Plugin URI: http://5156web.info/2012/03/07/2975.html
Description: A small plugin for wordpress article rating.rate it from 0 to 5,enjoy it!一款用于wordpress文章评级的小插件，最高评分5颗星，最低零分。评级过后无刷新显示文章评级结果，包括投票次数，平均得分数。
Version: 1.0 12319
Author: Mr.Wu
Author URI: http://5156web.info/
License: A "Slug" license name e.g. GPL2
*/

//定义在文章尾部插入的函数
function wurating(){
?>
<script>
function rate( value ) {
	new Ajax.Updater( "rating", "<?php bloginfo('url'); ?>/wp-content/plugins/wu-rating/wu-ratepost.php?id=<?php the_ID();?>&v="+value );
}
</script>

<div id="rating">
<div id="star-rating">
<li><a onclick="rate(1)" title="1/5" class="star1">1</a></li>
<li><a onclick="rate(2)" title="2/5" class="stars2">2</a></li>
<li><a onclick="rate(3)" title="3/5" class="stars3">3</a></li>
<li><a onclick="rate(4)" title="4/5" class="stars4">4</a></li>
<li><a onclick="rate(5)" title="5/5" class="stars5">5</a></li>
</div>
</div>

<?php
}
//边栏调用代码
function widget_sidebar_wurating() {
	function widget_wurating($args) {
	    extract($args);
		echo $before_widget;
		echo $before_title . '评级最高' . $after_title;
		global $wpdb;
        $most_wurating=$wpdb->get_results("SELECT * FROM wp_postmeta  WHERE meta_key = 'wu-arating' ORDER BY meta_value DESC LIMIT  10");
        	echo '<ul>';
            if($most_wurating) {
			foreach ($most_wurating as $post) {
			$pid = intval($post->post_id);
			$prate = $post->meta_value;
			$url = get_post($pid)->guid;
			$title = get_post($pid)->post_title;
			echo '<li>'.$prate.'<a href="'.$url.'" title="'.$title.'" target="_blank">'.$title.'</a></li>';
			}
		}else {
			echo 'N.A';}
            echo '</ul>';
		echo $after_widget;
	}
	register_sidebar_widget('五星评级', 'widget_wurating');
}

//在头部插入js和css代码
function wurating_head() {
      if ( is_singular() ){ ?>
<script src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.0.0/prototype.js"></script>
<link rel="stylesheet" href="<?php bloginfo('url'); ?>/wp-content/plugins/wu-rating/style.css" type="text/css" media="screen" />
<?php  } 
}

//执行插入动作
add_action('wp_head', 'wurating_head');
add_action('plugins_loaded', 'widget_sidebar_wurating');
?>