<?php

public function getDatosGrupo($idGrupo)
{
	return $facebook->api(
		array(
			'method'=>'fql.query',
			'query'=>"SELECT name, description, privacy, creator, pic_small FROM group WHERE gid=$idGrupo"
			)
		);
}


public function getMiembrosGrupo($idGrupo)
{
	return $facebook->api(
		array(
			'method'=>'fql.query',
			'query'=>"SELECT uid, name, pic_square FROM user WHERE uid IN(SELECT uid FROM group_member WHERE gid=$idGrupo)"
			)
		);
}


public function getPublicacionesGrupo($idGrupo)
{
	return $facebook->api(
		array(
			'method'=> 'fql.query',
			'query'=> "SELECT post_id, message, actor_id FROM stream WHERE source_id=$idGrupo"
			)
		);
}

public function getComentarioFromPublicacion($idPublicacion)
{
	return $facebook->api(
		array(
			'method' => 'fql.query',
			'query' =>"SELECT text, fromid FROM comment WHERE post_id=$idPublicacion"
			)
		);
}

 ?>
