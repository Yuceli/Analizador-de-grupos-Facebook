<!DOCTYPE html>
<html lang="en">

<head>

<?php

require 'proyecto/config.php';

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


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li>
                  <p>
                    T
                  </p>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Analizador</a>
                    </li>
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Graficas</a>
                    </li>
                    <li class="active">
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tablas</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
              <?php

                require "proyecto/funciones.php"

                $gid = $_GET['gid'];

               ?>
                <!-- Page Heading -->
                <div class="page-header">
                  <h1>Tablas</h1>
                </div>

                <div class="row">
                  <div class="col-md-3">

                  </div>
                </div>

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

</body>

</html>
