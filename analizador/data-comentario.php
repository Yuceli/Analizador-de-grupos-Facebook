<?php 

require 'proyecto/config.php';

$postId = $_GET['post'];


$comment_member =$facebook->api(array('method' => 'fql.query','query' =>"SELECT text, fromid FROM comment WHERE post_id=$postId"));


header("Content-Type: application/json");

$json = json_encode($comment_member);

print($json);

 ?>