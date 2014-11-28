<!DOCTYPE html>
<html lang="en">
<?php
require '/proyecto/config.php';

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
$gid= '1468449696753793';
//$gid=$_POST['clave']
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
                        <a href="inicio.html">Ir a aplicacion</a>
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
                        <a href="inicio.html"><i class="fa fa-fw fa-dashboard"></i> Introducción</a>
                    </li>
                    <li>
                        <a href="aplication.php"><i class="fa fa-fw fa-bar-chart-o"></i> Análisis de grupo</a>
                    </li>
                    <li class="active">
                        <a href="tables.php"><i class="fa fa-fw fa-table"></i> Análisis grupal</a>
                    </li>
                    <li>
                        <a href="estandar.html"><i class="fa fa-fw fa-edit"></i> Analizador estandar</a>
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

</body>

</html>
