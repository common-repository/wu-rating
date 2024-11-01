<?php
require( dirname(__FILE__) . '/../../../wp-blog-header.php' );
global $wpdb;

$v = $_GET['v'];
$d = $_GET['id'];
$w = 30*$v;

$sql = $wpdb->insert( 'wp_postmeta', array( 'post_id' => $d, 'meta_key' => 'wu-rating', 'meta_value' => $v ))
?>
<div class="star_<?php echo( ($v>0)?'on':'off' ) ?> left" title="Your Point: <?php echo $v;?> ☆"></div>
<div class="star_<?php echo( ($v>1)?'on':'off' ) ?> left" title="Your Point: <?php echo $v;?> ☆"></div>
<div class="star_<?php echo( ($v>2)?'on':'off' ) ?> left" title="Your Point: <?php echo $v;?> ☆"></div>
<div class="star_<?php echo( ($v>3)?'on':'off' ) ?> left" title="Your Point: <?php echo $v;?> ☆"></div>
<div class="star_<?php echo( ($v>4)?'on':'off' ) ?> left" title="Your Point: <?php echo $v;?> ☆"></div>
<?php
$results = $wpdb->get_row("SELECT COUNT( meta_value ) AS COUS, SUM( meta_value ) AS SUMS  
FROM wp_postmeta
WHERE meta_key =  'wu-rating'
AND post_id ='$d'");
?>
&nbsp;<?php echo round(($results->SUMS/$results->COUS),2); ?>/5(<?php echo $results->COUS; ?>次打分)
<?php
$av = round(($results->SUMS/$results->COUS),2);
if ($wpdb->query("select * from wp_postmeta where meta_key = 'wu-arating' AND post_id ='$d'")) {
  $wpdb->query("update wp_postmeta set meta_value='$av' where meta_key = 'wu-arating' AND post_id ='$d'");
  } else {
   $wpdb->query("insert into wp_postmeta (post_id, meta_key, meta_value) values ('$d','wu-arating','$av')");
  }
?>