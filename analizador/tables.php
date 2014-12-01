<!DOCTYPE html>
<html lang="en">
<?php
require 'proyecto/config.php';
require 'proyecto/funciones.php';

/* Obtener una sesion valida*/
$session = $facebook->getUser();

$me = null;
//$gid=$_POST['clave'];
if ($session) {
  /*checar si la sesion es valida*/
  try{
    $me = $facebook->api('/me');
  } catch (FacebookApiException $e){ }
}

if ($me) {
  //echo 'Usuario ya está está logueado ó tiene una sesion valida';

}
else {

  echo 'Redireccionando....';

  echo '<script>top.location.href="'.$facebook->getLoginUrl().'";</script>';

  $loginUrl = $facebook->getLoginUrl(array('req_perms'=>'manage_friendlists, publish_stream, publish_actions, user_groups, friends_groups'));
  /** usar el sig codigo para aplicacion frame  */
  echo '<script> top.location.href="'.$loginUrl.'"; </script>';
  exit;
  /** use el sig codigo para aplicaciones de terceros*/

  //header ('Location: '.$loginUrl);

}
?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Analizador de Facebook</title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/sb-admin.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>
  <?php
  //$gid= '1468449696753793';
  //$gid=$_POST['clave']

  $gid = $_GET['gid'];

  ?>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=593740170716314";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <div id="wrapper">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Analizador</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="index.html">Inicio</a>
          </li>
          <li>
            <a href="#">Contacto</a>
          </li>
          <li>
            <a href="#">Ayuda</a>
          </li>
          <li class="">
            <a href="inicio.php">Ir a aplicacion</a>
          </li>
          <li class="">
            <p id="fb-username" class="navbar-text">
            </p>
          </li>
          <li>
            <a class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="true" perms="read_stream, publish_stream, manage_friendlists, publish_stream, publish_actions, user_groups, friends_groups"></a>
          </li>
        </ul>
      </div>
      <!-- Top Menu Items -->
      <ul class="nav navbar-right top-nav">

      </ul>
      <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li>
            <a href="inicio.php"><i class="fa fa-fw fa-dashboard"></i> Introducción</a>
          </li>
          <li>
            <a href="<?php echo "aplication.php?gid=$gid" ?>"><i class="fa fa-fw fa-bar-chart-o"></i> Análisis de grupo</a>
          </li>
          <li class="active">
            <a href="<?php echo "tables.php?gid=$gid" ?>"><i class="fa fa-fw fa-table"></i> Análisis grupal</a>
          </li>
          <li>
            <a href="#"><i class="fa fa-fw fa-edit"></i> Analizador estandar</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">
              Análisis grupal
            </h1>
          </div>
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
            <?php

            $groups=$facebook->api(array('method'=>'fql.query','query'=>"SELECT name, description, privacy, creator, pic_small FROM group WHERE gid='" . $gid."'",));

            $miembrosGrupo=$facebook->api(array('method'=>'fql.query','query'=>"SELECT uid, name, pic_square FROM user WHERE uid IN(SELECT uid FROM group_member WHERE gid= '".$gid."')",));

            '<table>';
            '<tr><th>Nombre</th>
            <th>Descripcion</th>
            <th>Privacidad</th>
            <th>Creador</th>
            <th>Foto</td></th>';

            foreach ($groups as $group){
              '<tr><td>'."1".$group['name'].'</td>
              <td>'."2".$group['description'].'</td>
              <td>'."3".$group['privacy'].'</td>
              <td>'."4".$group['creator'].'</td>
              <td><img src="'.$group['pic_small'].'"/></td>
              </tr>';

            }
            '</table>';



            ?>


            <div class="row">
              <div class="col-md-6">
                <h4>Nombre del grupo: <?php echo $group['name'];?></h4>
                <h4>ID de grupo: <?php echo $gid;?></h4>
                <h4>Contacto: <?php echo $me['name']; ?></h4>
              </div>
            </div>
            <br>
            <h2>Habilidades Colaborativas</h2>
            <div role="tabpanel">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs nav-justified" role="tablist">
                <li role="presentation" class="active"><a href="#participacion" aria-controls="participacion" role="tab" data-toggle="tab">Participación</a></li>
                <li role="presentation"><a href="#indicadores" aria-controls="indicadores" role="tab" data-toggle="tab">Indicadores</a></li>
                <li role="presentation"><a href="#habilidades-usadas" aria-controls="habilidades-usadas" role="tab" data-toggle="tab">Habilidades Usadas</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane" id="indicadores">

                  <div class="row">
                    <div class="col-md-12">
                      <h3>Indicadores Individuales</h3>
                      <?php
                      # Declaraciones
                      $tablaDeOcurrencias = array();
                      $tablaDePromedios = array();

                      echo'<table class="table">';

                      echo '<thead>';
                      echo '<tr>';
                      echo '<th>ID</th>';
                      echo '<th>Estudiante</th>';
                      echo '<th>C</th>';
                      echo '<th>M</th>';
                      echo '<th>D</th>';
                      echo '<th>G</th>';
                      echo '<th>I.H.C.</th>';
                      // echo '<th>P.I.</th>';
                      echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';

                      # Por cada miembro de grupo
                      # Obtener sus publicaciones

                      $nMiembros = count($miembrosGrupo);
                      foreach($miembrosGrupo as $miembro){
                        $idUsuario = $miembro['uid'];

                        $publicacionesUsuario = $facebook->api(
                        array(
                          'method'=> 'fql.query',
                          'query'=> "SELECT post_id, message, actor_id FROM stream WHERE source_id=$gid AND actor_id=$idUsuario"
                        ));

                        $ocurrenciasUsuario = getCuentaOcurrenciasOracionesUsuario($publicacionesUsuario);

                        $tablaDeOcurrencias[$idUsuario] = $ocurrenciasUsuario;
                      } // fin del foreach de tabla 1

                      $publicacionesGrupo = $facebook->api(
                      array(
                        'method'=> 'fql.query',
                        'query'=> "SELECT post_id, message, actor_id FROM stream WHERE source_id=$gid"
                      ));

                      foreach($publicacionesGrupo as $publicacion){
                        foreach($miembrosGrupo as $miembro){
                          $idpu = explode("_", $publicacion['post_id']);
                          $post_id = intval($idpu[1]);

                          $fromid = $miembro['uid'];

                          $com = $facebook->api(array('method' => 'fql.query','query' =>"SELECT text, fromid FROM comment WHERE post_id=$post_id AND fromid=$fromid"));

                          // $miembro['ocurrencias'] = getCuentaOcurrenciasComentariosUsuario($com, $miembro['ocurrencias']);

                          $misOcurrencias = $tablaDeOcurrencias[$fromid];
                          $lasotras = getCuentaOcurrenciasComentariosUsuario($com, $misOcurrencias);

                          $tablaDeOcurrencias[$fromid] = $lasotras;

                        }// fin del otro
                      }// fin del foreach


                      foreach($miembrosGrupo as $m){
                        $ocurren = $tablaDeOcurrencias[$m['uid']];
                        $promedioC = getPromedioC($ocurren);
                        $promedioM = getPromedioM($ocurren);
                        $promedioD = getPromedioD($ocurren);
                        $promedioG = getPromedioG($ocurren);

                        $participacion = round($promedioC + $promedioM + $promedioD + $promedioG, 2);

                        $tablaDePromedios[ $m['uid'] ] = array(
                        'promedioC' => $promedioC,
                        'promedioM' => $promedioM,
                        'promedioD' => $promedioD,
                        'promedioG' => $promedioG,
                        'participacion' => $participacion
                        );

                        $promedioC = round($promedioC/15, 2);
                        $promedioM = round($promedioM/5, 2);
                        $promedioD = round($promedioD/10, 2);
                        $promedioG = round($promedioG/15, 2);

                        $indicadorfinalIndividual = round(indicadorUsuario($promedioC, $promedioM, $promedioD, $promedioG), 2);
                        echo '<tr>';
                          echo '<th>'.(string)$m['uid'].'</th>';
                          echo '<th class="indi-name">'.$m['name'].'</th>';
                          echo "<th class='indi-c'>$promedioC</th>";
                          echo "<th class='indi-m'>$promedioM</th>";
                          echo "<th class='indi-d'>$promedioD</th>";
                          echo "<th class='indi-g'>$promedioG</th>";
                          echo "<th>$indicadorfinalIndividual</th>";
                          // echo "<th>$participacion</th>";
                          echo '</tr>';
                        }

                        $pGeneralC = 0;
                        $pGeneralM = 0;
                        $pGeneralD = 0;
                        $pGeneralG = 0;
                        $indicadorGpo = 0;
                        $participacionGpo = 0;

                        foreach($miembrosGrupo as $m){
                          $tb = $tablaDePromedios[ $m['uid'] ];

                          $pGeneralC += $tb['promedioC']/15;
                          $pGeneralM += $tb['promedioM']/5;
                          $pGeneralD += $tb['promedioD']/10;
                          $pGeneralG += $tb['promedioG']/15;
                          $participacionGpo += $tb['participacion'];

                        }

                        $pGeneralC = round(($pGeneralC/$nMiembros), 2);
                        $pGeneralM = round(($pGeneralM/$nMiembros), 2);
                        $pGeneralD = round(($pGeneralD/$nMiembros), 2);
                        $pGeneralG = round(($pGeneralG/$nMiembros), 2);

                        $indicadorGpo = round(($pGeneralC + $pGeneralD + $pGeneralG + $pGeneralM) /4, 2);

                        $participacionGpo = round(($participacionGpo / $nMiembros), 2);


                        echo '</tbody>';
                        echo '<tfooter>';
                          echo '<tr>';
                            echo '<th>Total</th>';
                            echo '<th> </th>';
                            echo "<th>$pGeneralC</th>";
                            echo "<th>$pGeneralM</th>";
                            echo "<th>$pGeneralD</th>";
                            echo "<th>$pGeneralG</th>";
                            echo "<th>$indicadorGpo</th>";
                            // echo "<th>$participacionGpo</th>";
                            echo '</tr>';
                            echo '</tfooter>';
                            echo'</table>';



                            ?>
                          </div>
                      </div>


              </div>
                <div role="tabpanel" class="tab-pane" id="habilidades-usadas">
                  <div class="row">
                    <div class="col-md-12">
                      <h3>Habilidades Utilizadas</h3>

                      <?php

                      $tablaDeU = array();

                      echo'<table class="table">';

                      echo '<thead>';
                      echo '<tr>';
                      echo '<th>ID</th>';
                      echo '<th>Estudiante</th>';
                      echo '<th>CU</th>';
                      echo '<th>MU</th>';
                      echo '<th>DU</th>';
                      echo '<th>GU</th>';
                      echo '<th>HCUE</th>';
                      echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';

                      foreach($miembrosGrupo as $miembro){
                        $tb = $tablaDePromedios[ $miembro['uid'] ];

                        $part = $tb['participacion'];
                        $cs = $tb['promedioC'];
                        $CU = round(calculoHabilidadUsada($part, $cs), 2);

                        $ms = $tb['promedioM'];

                        $MU = round(calculoHabilidadUsada($part, $ms), 2);

                        $ds = $tb['promedioD'];

                        $DU = round(calculoHabilidadUsada($part, $ds), 2);

                        $gs = $tb['promedioG'];

                        $GU = round(calculoHabilidadUsada($part, $gs), 2);

                        $HCUE = round(($CU + $MU + $DU + $GU)/4, 2);

                        $tablaDeU[ $miembro['uid'] ] = array(
                          'CU' => $CU,
                          'MU' => $MU,
                          'DU' => $DU,
                          'GU' => $GU
                        );

                        echo '<tr>';
                          echo '<th>'.(string)$miembro['uid'].'</th>';
                          echo '<th>'.$miembro['name'].'</th>';
                          echo "<th class='habil-c' >$CU</th>";
                          echo "<th class='habil-m' >$MU</th>";
                          echo "<th class='habil-d' >$DU</th>";
                          echo "<th class='habil-g' >$GU</th>";
                          echo "<th>$HCUE</th>";
                          echo '</tr>';

                        }

                        $CGU = 0; $MGU = 0; $DGU = 0; $GGU = 0;
                        $HCGU = 0;

                        foreach($miembrosGrupo as $m ){
                          $ctb = $tablaDeU[ $m['uid'] ];

                          $CGU += $ctb['CU'];
                          $MGU += $ctb['MU'];
                          $DGU += $ctb['DU'];
                          $GGU += $ctb['GU'];

                        }

                        $CGU = round( $CGU/$nMiembros ,2);
                        $MGU = round( $MGU/$nMiembros ,2);
                        $DGU = round( $DGU/$nMiembros ,2);
                        $GGU = round( $GGU/$nMiembros ,2);

                        $HCGU = round( ( $CGU+$MGU+$DGU+$GGU )/4 , 2);

                        echo '</tbody>';
                        echo '<tfooter>';
                          echo '<tr>';
                            echo '<th>Total</th>';
                            echo '<th> </th>';
                            echo "<th>$CGU</th>";
                            echo "<th>$MGU</th>";
                            echo "<th>$DGU</th>";
                            echo "<th>$GGU</th>";
                            echo "<th>$HCGU</th>";
                            echo '</tr>';
                            echo '</tfooter>';
                            echo'</table>';

                            ?>

                          </div>
                        </div>
                        <!--tabla dos-->
                </div>
                <div role="tabpanel" class="tab-pane active" id="participacion">
                  <div class="row">
                    <div class="col-md-12">
                      <h3>Participación</h3>

                      <table class="table">
                             <thead>
                              <tr>
                                <th>Nombre</th>
                                <th>C</th>
                                <th>M</th>
                                <th>D</th>
                                <th>G</th>
                                <th>Total</th>
                              </tr>
                             </thead>
                             <tbody>
                              <?php

                              foreach($miembrosGrupo as $miembro){
                                $contadorDatos = 0;
                                echo '<tr>';

                                $nombre = $miembro['name'];

                                echo "<th>$nombre</th>";

                                $promedios = $tablaDePromedios[ $miembro['uid'] ];

                                $pC = $promedios['promedioC'];
                                $pM = $promedios['promedioM'];
                                $pD = $promedios['promedioD'];
                                $pG = $promedios['promedioG'];

                                echo "<th class='parti-c'>$pC</th>";
                                echo "<th class='parti-m'>$pM</th>";
                                echo "<th class='parti-d'>$pD</th>";
                                echo "<th class='parti-g'>$pG</th>";

                                $total = $pC + $pM + $pD + $pG;

                                echo "<th>$total</th>";

                                echo '</tr>';

                              }


                               ?>
                             </tbody>
                      </table>

                    </div>
                  </div>
                </div>
              </div>

            </div>
            <hr>
            <div class="row">
              <div class="col-md-4">
                <center><h4>Participación</h4></center>
                <canvas id="chart-participacion" height="300"></canvas>
              </div>
              <div class="col-md-4">
                <center><h4>Indicadores</h4></center>
                <canvas id="chart-indicador" height="300"></canvas>
              </div>
              <div class="col-md-4">
                <center><h4>Habilidades Usadas</h4></center>
                <canvas id="chart-habilidades" height="300"></canvas>
              </div>
            </div>
          </div>


          </div>
          <!-- Termina tablas -->


        </div>
        <!-- /.row -->

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- jQuery Version 1.11.0 -->
  <script src="js/jquery-1.11.0.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

  <script src="js/Chart.js"></script>

  <script src="js/tables-charts.js"></script>


</body>

</html>
