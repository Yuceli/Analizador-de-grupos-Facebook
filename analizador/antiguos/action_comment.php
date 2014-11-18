<?php
require '/proyecto/config.php';
$post_id='402145746594459';
$message=$_POST['message'];

$comment_id = $facebook->api('/'.post_id.'/comments','POST',array('message'=>$message,));
//$delete = $facebook->api('/'.comment_id.'','DELETE');
?>
