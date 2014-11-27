<!DOCTYPE html>
<meta charset="utf-8">
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

<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Analizador de grupos Facebook</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>
    <script src="js/table.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
      
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
                    <li class="active">
                        <a href="aplication.php"><i class="fa fa-fw fa-bar-chart-o"></i> Análisis de grupo</a>
                    </li>
                    <li>
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
                <div class="page-header">
                    <h1>Análisis de grupo</h1>
                </div>
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



        
 <!--Comienza tabla de miembros-->  
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Tabla de miembros</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtro</button>
                </div>
            </div>
             <?php
  $grp_members=$facebook->api(array('method'=>'fql.query','query'=>"SELECT uid, name, pic_square FROM user WHERE uid IN(SELECT uid FROM group_member WHERE gid= '".$gid."')",));
   $id_nom[50][2]="";// LIMITADO A 50 USUARIOS
   $i=0;
   $j=0;
   $con_member=0;

    

            echo'<table class="table">';
                echo '<thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>
                        <th><input type="text" class="form-control" placeholder="ID de usuario" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nombre" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Foto de perfil" disabled></th>
                    </tr>
                    </thead>';


                    foreach ($grp_members as $grp_member){
                        $con_member++;
                        $id_nom[$i][0]= $grp_member['uid'];
                        $id_nom[$i][1]= $grp_member['name'];


                   echo'<tr>
                        <td>'.$con_member.'</td>
                        <td>'.$grp_member['uid'].'</td>
                        <td>'.$grp_member['name'].'</td>
                        <td><img src="'.$grp_member['pic_square'].'"/></td>
                    </tr>';
                     $i=$i+1;
                          }
               echo'</tbody>';
            echo'</table>'?>
        </div>
    </div>
<!--Finaliza tabla de miembros-->




<div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Tabla de publicaciones</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtro</button>
                </div>
            </div>
             <?php
             $pruebas1 = $facebook->api(array('method'=> 'fql.query','query'=> "SELECT post_id, message, actor_id FROM stream WHERE source_id='".$gid."'",));

            echo'<table class="table">';
                echo '<thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="ID de publicación" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Mensaje" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Actor" disabled></th>
                    </tr>
                    </thead>';


                    $var[50][1]="";
                    $ctronombre[50]="";
                    $x=0;
                    foreach ($pruebas1 as $prueba1){
                      $var[$x][0]= $prueba1['post_id'];
                      $var[$x][1]= $prueba1['actor_id'];
                      $ctronombre[$x] =buscar_nombre($var[$x][1],$id_nom);
                      $x=$x+1;


                   echo'<tr>
                        <td>'.$prueba1['post_id'].'</td>
                        <td>'.$prueba1['message'].'</td>
                        <td>'.$grp_member['name'].'</td>
                    </tr>';
                          }
               echo'</tbody>';
            echo'</table>';
            //tomo y guardo en una variable array el id compuesto post mas reciente, tengo que tomar la segunda parte de para enviarlo en mi sig consulta.

echo "<br>";
$longitud = strlen("$gid")+1;// quitar hasta el gin en la clave id de la publicacion
//echo "Variable ofelia: ".$pru1= substr($var[0][0],$longitud)."<br>";
echo "<br>";


?>


<?php
//$vectorVariable[2] = substr($var[0],$longitud);
//$pru= substr($var[3][0],$longitud);// Tomo la ultima publicacion

$pru= '287611711428276';



function buscar_nombre($buscar,$_idnom) {

  $i=0;

while($i<50) {
  if ($buscar==$_idnom[$i][0]){
 $ctro_graf =  $_idnom[$i][1];
    return $ctro_graf;
    } 
   $i++;
           } 
 
                                          }

echo "<br>";


 ?>
</div>
</div>


</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
</div>
</body>
</html>
