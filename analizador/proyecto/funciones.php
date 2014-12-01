<?php
//require 'config.php';

//$face = $facebook;
/*

$datoIDP = $publicacionesUsuario[0]['post_id'];
$idpu = explode("_", $datoIDP);
$idPost = intval($idpu[1]);

$com = $facebook->api(array('method' => 'fql.query','query' =>"SELECT text, fromid FROM comment WHERE post_id=$idPost AND fromid=100006394665603"));


function getDatosGrupo($idGrupo)
{
	return $facebook->api(
		array(
			'method'=>'fql.query',
			'query'=>"SELECT name, description, privacy, creator, pic_small FROM group WHERE gid=$idGrupo"
			)
		);
}


function getMiembrosGrupo($idGrupo)
{
	return $facebook->api(
		array(
			'method'=>'fql.query',
			'query'=>"SELECT uid, name, pic_square FROM user WHERE uid IN(SELECT uid FROM group_member WHERE gid=$idGrupo)"
			)
		);
}


function getPublicacionesGrupo($idGrupo)
{
	return $facebook->api(
		array(
			'method'=> 'fql.query',
			'query'=> "SELECT post_id, message, actor_id FROM stream WHERE source_id=$idGrupo"
			)
		);
}

function getComentarioFromPublicacion($idPublicacion)
{
	return $facebook->api(
		array(
			'method' => 'fql.query',
			'query' =>"SELECT text, fromid FROM comment WHERE post_id=$idPublicacion"
			)
		);
}


function getPostsUsuarioEnGrupo($idGrupo, $idUsuario)
{
	return $facebook->api(
		array(
			'method'=> 'fql.query',
			'query'=> "SELECT post_id, message, actor_id FROM stream WHERE source_id=$idGrupo AND actor_id=$idUsuario"
			)
		);
}

*/
/**
 * Devuelve un arreglo con las ocurrencias de cada uno de los indicadores
 * Este arreglo es unico para cada usuario
 */
function getCuentaOcurrenciasOracionesUsuario($postsUsuario)
{
	$ocurrencias = initOcurrencias();
	foreach ($postsUsuario as $post) {

		if (preg_match('/(C01)/i',$post['message'])) {
			$ocurrencias['C01'] = $ocurrencias['C01'] + 1;
		}elseif (preg_match('/(C02)/i',$post['message'])) {
			$ocurrencias['C02'] = $ocurrencias['C02'] + 1;
		}elseif (preg_match('/(C03)/i',$post['message'])) {
			$ocurrencias['C03'] = $ocurrencias['C03'] + 1;
		}elseif (preg_match('/(C04)/i',$post['message'])) {
			$ocurrencias['C04'] = $ocurrencias['C04'] + 1;
		}elseif (preg_match('/(C05)/i',$post['message'])) {
			$ocurrencias['C05'] = $ocurrencias['C05'] + 1;
		}elseif (preg_match('/(C06)/i',$post['message'])) {
			$ocurrencias['C06'] = $ocurrencias['C06'] + 1;
		}elseif (preg_match('/(C07)/i',$post['message'])) {
			$ocurrencias['C07'] = $ocurrencias['C07'] + 1;
		}elseif (preg_match('/(C08)/i',$post['message'])) {
			$ocurrencias['C08'] = $ocurrencias['C08'] + 1;
		}elseif (preg_match('/(C09)/i',$post['message'])) {
			$ocurrencias['C09'] = $ocurrencias['C09'] + 1;
		}elseif (preg_match('/(C10)/i',$post['message'])) {
			$ocurrencias['C10'] = $ocurrencias['C10'] + 1;
		}elseif (preg_match('/(C11)/i',$post['message'])) {
			$ocurrencias['C11'] = $ocurrencias['C11'] + 1;
		}elseif (preg_match('/(C12)/i',$post['message'])) {
			$ocurrencias['C12'] = $ocurrencias['C12'] + 1;
		}elseif (preg_match('/(C13)/i',$post['message'])) {
			$ocurrencias['C13'] = $ocurrencias['C13'] + 1;
		}elseif (preg_match('/(C14)/i',$post['message'])) {
			$ocurrencias['C14'] = $ocurrencias['C14'] + 1;
		}elseif (preg_match('/(C15)/i',$post['message'])) {
			$ocurrencias['C15'] = $ocurrencias['C15'] + 1;
		}elseif (preg_match('/(M01)/i',$post['message'])) {
			$ocurrencias['M01'] = $ocurrencias['M01'] + 1;
		}elseif (preg_match('/(M02)/i',$post['message'])) {
			$ocurrencias['M02'] = $ocurrencias['M02'] + 1;
		}elseif (preg_match('/(M03)/i',$post['message'])) {
			$ocurrencias['M03'] = $ocurrencias['M03'] + 1;
		}elseif (preg_match('/(M04)/i',$post['message'])) {
			$ocurrencias['M04'] = $ocurrencias['M04'] + 1;
		}elseif (preg_match('/(M05)/i',$post['message'])) {
			$ocurrencias['M05'] = $ocurrencias['M05'] + 1;
		}elseif (preg_match('/(D01)/i',$post['message'])) {
			$ocurrencias['D01'] = $ocurrencias['D01'] + 1;
		}elseif (preg_match('/(D02)/i',$post['message'])) {
			$ocurrencias['D02'] = $ocurrencias['D02'] + 1;
		}elseif (preg_match('/(D03)/i',$post['message'])) {
			$ocurrencias['D03'] = $ocurrencias['D03'] + 1;
		}elseif (preg_match('/(D04)/i',$post['message'])) {
			$ocurrencias['D04'] = $ocurrencias['D04'] + 1;
		}elseif (preg_match('/(D05)/i',$post['message'])) {
			$ocurrencias['D05'] = $ocurrencias['D05'] + 1;
		}elseif (preg_match('/(D06)/i',$post['message'])) {
			$ocurrencias['D06'] = $ocurrencias['D06'] + 1;
		}elseif (preg_match('/(D07)/i',$post['message'])) {
			$ocurrencias['D07'] = $ocurrencias['D07'] + 1;
		}elseif (preg_match('/(D08)/i',$post['message'])) {
			$ocurrencias['D08'] = $ocurrencias['D08'] + 1;
		}elseif (preg_match('/(D09)/i',$post['message'])) {
			$ocurrencias['D09'] = $ocurrencias['D09'] + 1;
		}elseif (preg_match('/(D10)/i',$post['message'])) {
			$ocurrencias['D10'] = $ocurrencias['D10'] + 1;
		}elseif (preg_match('/(G01)/i',$post['message'])) {
			$ocurrencias['G01'] = $ocurrencias['G01'] + 1;
		}elseif (preg_match('/(G02)/i',$post['message'])) {
			$ocurrencias['G02'] = $ocurrencias['G02'] + 1;
		}elseif (preg_match('/(G03)/i',$post['message'])) {
			$ocurrencias['G03'] = $ocurrencias['G03'] + 1;
		}elseif (preg_match('/(G04)/i',$post['message'])) {
			$ocurrencias['G04'] = $ocurrencias['G04'] + 1;
		}elseif (preg_match('/(G05)/i',$post['message'])) {
			$ocurrencias['G05'] = $ocurrencias['G05'] + 1;
		}elseif (preg_match('/(G05)/i',$post['message'])) {
			$ocurrencias['G05'] = $ocurrencias['G05'] + 1;
		}elseif (preg_match('/(G06)/i',$post['message'])) {
			$ocurrencias['G06'] = $ocurrencias['G06'] + 1;
		}elseif (preg_match('/(G07)/i',$post['message'])) {
			$ocurrencias['G07'] = $ocurrencias['G07'] + 1;
		}elseif (preg_match('/(G08)/i',$post['message'])) {
			$ocurrencias['G08'] = $ocurrencias['G08'] + 1;
		}elseif (preg_match('/(G09)/i',$post['message'])) {
			$ocurrencias['G09'] = $ocurrencias['G09'] + 1;
		}elseif (preg_match('/(G10)/i',$post['message'])) {
			$ocurrencias['G10'] = $ocurrencias['G10'] + 1;
		}elseif (preg_match('/(G11)/i',$post['message'])) {
			$ocurrencias['G11'] = $ocurrencias['G11'] + 1;
		}elseif (preg_match('/(G12)/i',$post['message'])) {
			$ocurrencias['G12'] = $ocurrencias['G12'] + 1;
		}elseif (preg_match('/(G13)/i',$post['message'])) {
			$ocurrencias['G13'] = $ocurrencias['G13'] + 1;
		}elseif (preg_match('/(G14)/i',$post['message'])) {
			$ocurrencias['G14'] = $ocurrencias['G14'] + 1;
		}elseif (preg_match('/(G15)/i',$post['message'])) {
			$ocurrencias['G15'] = $ocurrencias['G15'] + 1;
		}

	} // End foreach
	return $ocurrencias;
}

function getCuentaOcurrenciasComentariosUsuario($comentariosUsuario, $ocurrencias)
{
	// $ocurrencias = initOcurrencias();
	foreach ($comentariosUsuario as $comentario) {

		if (preg_match('/(C01)/i',$comentario['text'])) {
			$ocurrencias['C01'] = $ocurrencias['C01'] + 1;
		}elseif (preg_match('/(C02)/i',$comentario['text'])) {
			$ocurrencias['C02'] = $ocurrencias['C02'] + 1;
		}elseif (preg_match('/(C03)/i',$comentario['text'])) {
			$ocurrencias['C03'] = $ocurrencias['C03'] + 1;
		}elseif (preg_match('/(C04)/i',$comentario['text'])) {
			$ocurrencias['C04'] = $ocurrencias['C04'] + 1;
		}elseif (preg_match('/(C05)/i',$comentario['text'])) {
			$ocurrencias['C05'] = $ocurrencias['C05'] + 1;
		}elseif (preg_match('/(C06)/i',$comentario['text'])) {
			$ocurrencias['C06'] = $ocurrencias['C06'] + 1;
		}elseif (preg_match('/(C07)/i',$comentario['text'])) {
			$ocurrencias['C07'] = $ocurrencias['C07'] + 1;
		}elseif (preg_match('/(C08)/i',$comentario['text'])) {
			$ocurrencias['C08'] = $ocurrencias['C08'] + 1;
		}elseif (preg_match('/(C09)/i',$comentario['text'])) {
			$ocurrencias['C09'] = $ocurrencias['C09'] + 1;
		}elseif (preg_match('/(C10)/i',$comentario['text'])) {
			$ocurrencias['C10'] = $ocurrencias['C10'] + 1;
		}elseif (preg_match('/(C11)/i',$comentario['text'])) {
			$ocurrencias['C11'] = $ocurrencias['C11'] + 1;
		}elseif (preg_match('/(C12)/i',$comentario['text'])) {
			$ocurrencias['C12'] = $ocurrencias['C12'] + 1;
		}elseif (preg_match('/(C13)/i',$comentario['text'])) {
			$ocurrencias['C13'] = $ocurrencias['C13'] + 1;
		}elseif (preg_match('/(C14)/i',$comentario['text'])) {
			$ocurrencias['C14'] = $ocurrencias['C14'] + 1;
		}elseif (preg_match('/(C15)/i',$comentario['text'])) {
			$ocurrencias['C15'] = $ocurrencias['C15'] + 1;
		}elseif (preg_match('/(M01)/i',$comentario['text'])) {
			$ocurrencias['M01'] = $ocurrencias['M01'] + 1;
		}elseif (preg_match('/(M02)/i',$comentario['text'])) {
			$ocurrencias['M02'] = $ocurrencias['M02'] + 1;
		}elseif (preg_match('/(M03)/i',$comentario['text'])) {
			$ocurrencias['M03'] = $ocurrencias['M03'] + 1;
		}elseif (preg_match('/(M04)/i',$comentario['text'])) {
			$ocurrencias['M04'] = $ocurrencias['M04'] + 1;
		}elseif (preg_match('/(M05)/i',$comentario['text'])) {
			$ocurrencias['M05'] = $ocurrencias['M05'] + 1;
		}elseif (preg_match('/(D01)/i',$comentario['text'])) {
			$ocurrencias['D01'] = $ocurrencias['D01'] + 1;
		}elseif (preg_match('/(D02)/i',$comentario['text'])) {
			$ocurrencias['D02'] = $ocurrencias['D02'] + 1;
		}elseif (preg_match('/(D03)/i',$comentario['text'])) {
			$ocurrencias['D03'] = $ocurrencias['D03'] + 1;
		}elseif (preg_match('/(D04)/i',$comentario['text'])) {
			$ocurrencias['D04'] = $ocurrencias['D04'] + 1;
		}elseif (preg_match('/(D05)/i',$comentario['text'])) {
			$ocurrencias['D05'] = $ocurrencias['D05'] + 1;
		}elseif (preg_match('/(D06)/i',$comentario['text'])) {
			$ocurrencias['D06'] = $ocurrencias['D06'] + 1;
		}elseif (preg_match('/(D07)/i',$comentario['text'])) {
			$ocurrencias['D07'] = $ocurrencias['D07'] + 1;
		}elseif (preg_match('/(D08)/i',$comentario['text'])) {
			$ocurrencias['D08'] = $ocurrencias['D08'] + 1;
		}elseif (preg_match('/(D09)/i',$comentario['text'])) {
			$ocurrencias['D09'] = $ocurrencias['D09'] + 1;
		}elseif (preg_match('/(D10)/i',$comentario['text'])) {
			$ocurrencias['D10'] = $ocurrencias['D10'] + 1;
		}elseif (preg_match('/(G01)/i',$comentario['text'])) {
			$ocurrencias['G01'] = $ocurrencias['G01'] + 1;
		}elseif (preg_match('/(G02)/i',$comentario['text'])) {
			$ocurrencias['G02'] = $ocurrencias['G02'] + 1;
		}elseif (preg_match('/(G03)/i',$comentario['text'])) {
			$ocurrencias['G03'] = $ocurrencias['G03'] + 1;
		}elseif (preg_match('/(G04)/i',$comentario['text'])) {
			$ocurrencias['G04'] = $ocurrencias['G04'] + 1;
		}elseif (preg_match('/(G05)/i',$comentario['text'])) {
			$ocurrencias['G05'] = $ocurrencias['G05'] + 1;
		}elseif (preg_match('/(G05)/i',$comentario['text'])) {
			$ocurrencias['G05'] = $ocurrencias['G05'] + 1;
		}elseif (preg_match('/(G06)/i',$comentario['text'])) {
			$ocurrencias['G06'] = $ocurrencias['G06'] + 1;
		}elseif (preg_match('/(G07)/i',$comentario['text'])) {
			$ocurrencias['G07'] = $ocurrencias['G07'] + 1;
		}elseif (preg_match('/(G08)/i',$comentario['text'])) {
			$ocurrencias['G08'] = $ocurrencias['G08'] + 1;
		}elseif (preg_match('/(G09)/i',$comentario['text'])) {
			$ocurrencias['G09'] = $ocurrencias['G09'] + 1;
		}elseif (preg_match('/(G10)/i',$comentario['text'])) {
			$ocurrencias['G10'] = $ocurrencias['G10'] + 1;
		}elseif (preg_match('/(G11)/i',$comentario['text'])) {
			$ocurrencias['G11'] = $ocurrencias['G11'] + 1;
		}elseif (preg_match('/(G12)/i',$comentario['text'])) {
			$ocurrencias['G12'] = $ocurrencias['G12'] + 1;
		}elseif (preg_match('/(G13)/i',$comentario['text'])) {
			$ocurrencias['G13'] = $ocurrencias['G13'] + 1;
		}elseif (preg_match('/(G14)/i',$comentario['text'])) {
			$ocurrencias['G14'] = $ocurrencias['G14'] + 1;
		}elseif (preg_match('/(G15)/i',$comentario['text'])) {
			$ocurrencias['G15'] = $ocurrencias['G15'] + 1;
		}

	} // End foreach
	return $ocurrencias;
}


function initOcurrencias(){

	$ocurrencias = array();

	$ocurrencias['C01'] = 0;
	$ocurrencias['C02'] = 0;
	$ocurrencias['C03'] = 0;
	$ocurrencias['C04'] = 0;
	$ocurrencias['C05'] = 0;
	$ocurrencias['C06'] = 0;
	$ocurrencias['C07'] = 0;
	$ocurrencias['C08'] = 0;
	$ocurrencias['C09'] = 0;
	$ocurrencias['C10'] = 0;
	$ocurrencias['C11'] = 0;
	$ocurrencias['C12'] = 0;
	$ocurrencias['C13'] = 0;
	$ocurrencias['C14'] = 0;
	$ocurrencias['C15'] = 0;
	######################################
	$ocurrencias['M01'] = 0;
	$ocurrencias['M02'] = 0;
	$ocurrencias['M03'] = 0;
	$ocurrencias['M04'] = 0;
	$ocurrencias['M05'] = 0;
	######################################
	$ocurrencias['D01'] = 0;
	$ocurrencias['D02'] = 0;
	$ocurrencias['D03'] = 0;
	$ocurrencias['D04'] = 0;
	$ocurrencias['D05'] = 0;
	$ocurrencias['D06'] = 0;
	$ocurrencias['D07'] = 0;
	$ocurrencias['D08'] = 0;
	$ocurrencias['D09'] = 0;
	$ocurrencias['D10'] = 0;
	#####################################
	$ocurrencias['G01'] = 0;
	$ocurrencias['G02'] = 0;
	$ocurrencias['G03'] = 0;
	$ocurrencias['G04'] = 0;
	$ocurrencias['G05'] = 0;
	$ocurrencias['G06'] = 0;
	$ocurrencias['G07'] = 0;
	$ocurrencias['G08'] = 0;
	$ocurrencias['G09'] = 0;
	$ocurrencias['G10'] = 0;
	$ocurrencias['G11'] = 0;
	$ocurrencias['G12'] = 0;
	$ocurrencias['G13'] = 0;
	$ocurrencias['G14'] = 0;
	$ocurrencias['G15'] = 0;

	return $ocurrencias;
}

function getPromedioC($ocurrencias){
	$promedio = 0;
	$c = 0;
	$c += $ocurrencias['C01'];
	$c += $ocurrencias['C02'];
	$c += $ocurrencias['C03'];
	$c += $ocurrencias['C04'];
	$c += $ocurrencias['C05'];
	$c += $ocurrencias['C06'];
	$c += $ocurrencias['C07'];
	$c += $ocurrencias['C08'];
	$c += $ocurrencias['C09'];
	$c += $ocurrencias['C10'];
	$c += $ocurrencias['C11'];
	$c += $ocurrencias['C12'];
	$c += $ocurrencias['C13'];
	$c += $ocurrencias['C14'];
	$c += $ocurrencias['C15'];

	// $promedio = $c/15;
	$promedio = $c;

	return $promedio;

}

function getPromedioM($ocurrencias){
	$promedio = 0;
	$c = 0;
	$c += $ocurrencias['M01'];
	$c += $ocurrencias['M02'];
	$c += $ocurrencias['M03'];
	$c += $ocurrencias['M04'];
	$c += $ocurrencias['M05'];

	$promedio = $c;
	// $promedio = $c/5;

	return $promedio;
}

function getPromedioD($ocurrencias){
	$promedio = 0;
	$c = 0;
	$c += $ocurrencias['D01'];
	$c += $ocurrencias['D02'];
	$c += $ocurrencias['D03'];
	$c += $ocurrencias['D04'];
	$c += $ocurrencias['D05'];
	$c += $ocurrencias['D06'];
	$c += $ocurrencias['D07'];
	$c += $ocurrencias['D08'];
	$c += $ocurrencias['D09'];
	$c += $ocurrencias['D10'];

	$promedio = $c;
	// $promedio = $c / 10;

	return $promedio;
}

function getPromedioG($ocurrencias){
	$promedio = 0;
	$c = 0;
	$c += $ocurrencias['G01'];
	$c += $ocurrencias['G02'];
	$c += $ocurrencias['G03'];
	$c += $ocurrencias['G04'];
	$c += $ocurrencias['G05'];
	$c += $ocurrencias['G06'];
	$c += $ocurrencias['G07'];
	$c += $ocurrencias['G08'];
	$c += $ocurrencias['G09'];
	$c += $ocurrencias['G10'];
	$c += $ocurrencias['G11'];
	$c += $ocurrencias['G12'];
	$c += $ocurrencias['G13'];
	$c += $ocurrencias['G14'];
	$c += $ocurrencias['G15'];

	$promedio = $c;
	// $promedio = $c/15;
	return $promedio;
}

function indicadorUsuario($c, $m, $d, $g){
	return ($c + $m + $d + $g)/4;
}

function calculoHabilidadUsada($participacion, $promedioIndicador){

	if($participacion <= 0){
		return 0;
	}else{
		return (1/$participacion) * $promedioIndicador;
	}
}


?>
