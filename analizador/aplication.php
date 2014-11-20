<!DOCTYPE html>
<meta charset="utf-8">
<?php
require '/proyecto/config.php';


/* Obtener una sesionvalida*/
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
//echo 'Usuario ya está está loguiado ó tiene una sesion valida';

 }
  else {
        
        echo 'Sesion expirada o usuario no ha sido logueado aun. redireccionando....';

        echo '<script>top.location.href="'.$facebook->getLoginUrl().'";</script>';
        
    $loginUrl = $facebook->getLoginUrl(array('req_perms'=>'manage_friendlists, publish_stream, publish_actions, user_groups, friends_groups'));
    /** usar el sig codigo para aplcacion frame  */
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

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
    <script src="js/app.js"></script>



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
                <a class="navbar-brand" href="index.html">Analizador</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="active">
                    <p id="fb-username" class="navbar-text">
                    </p>
                </li>
                <li>
                    <div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="true" perms="read_stream, publish_stream, manage_friendlists, publish_stream, publish_actions, user_groups, friends_groups"></div>

                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
 


        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="page-header">
                    <h1>Analizador</h1>
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

                 <div class="pull-left">

                  <?php
                  $grp_members=$facebook->api(array('method'=>'fql.query','query'=>"SELECT uid, name, pic_square FROM user WHERE uid IN(SELECT uid FROM group_member WHERE gid= '".$gid."')",));
     $id_nom[50][2]="";// LIMITADO A 50 USUARIOS
     $i=0;
     $j=0;
     $con_member=0;
     echo '<table>';
     echo '<tr>
     <th>No.</th>
     <th>ID USER</th>
     <th>NOMBRE</th>
     <th>FOTO DE PERFIL</th></tr>';


     foreach ($grp_members as $grp_member){

      $con_member++;
      $id_nom[$i][0]= $grp_member['uid'];
      $id_nom[$i][1]= $grp_member['name'];

      echo '<tr>
      <td>'.$con_member.'</td>
      <td>'.$grp_member['uid'].'</td>
      <td>'.$grp_member['name'].'</td>
      <td><img src="'.$grp_member['pic_square'].'"/></td></tr>';

      $i=$i+1;
  }
  echo '</table>';
  ?>
  <br>
  <br>
  Publicaciones del grupo de Maestria con ID <strong><?php echo $gid; ?></strong> : <br>
  <br>
  <?php
  $pruebas1 = $facebook->api(array('method'=> 'fql.query','query'=> "SELECT post_id, message, actor_id FROM stream WHERE source_id='".$gid."'"  ,));
  echo '<table>';
  echo '<tr><th>ID de la publicacion</th>
  <th>Mensaje</th>
  <th>Actor</th>
  </tr>';
  $var[50][1]="";
  $ctronombre[50]="";
  $x=0;
  foreach ($pruebas1 as $prueba1){
    $var[$x][0]= $prueba1['post_id'];
    $var[$x][1]= $prueba1['actor_id'];
    $ctronombre[$x] =buscar_nombre($var[$x][1],$id_nom);
    $x=$x+1;
    echo '<tr><td>'.$prueba1['post_id'].'</td>
    <td>'.$prueba1['message'].'</td>
    <td>'.$prueba1['actor_id'].'</td>
    </tr>';
}
echo '</table>';

    //tomo y guardo en una variable array el id compuesto post mas reciente, tengo que tomar la segunda parte de para enviarlo en mi sig consulta.

echo "<br>";
    $longitud = strlen("$gid")+1;// quitar hasta el gin en la clave id de la publicacion
    //echo "Variable ofelia: ".$pru1= substr($var[0][0],$longitud)."<br>";
    echo "<br>";


    ?>
    <?php
    //$vectorVariable[2] = substr($var[0],$longitud);
    $pru= substr($var[3][0],$longitud);// Tomo la ultima publicacion

    //$pru= '240618486127599';



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

<br>
Comentarios de la ultima publicacion del grupo con ID <strong><?php echo $gid; ?></strong> : <br>
<br>

<?php
$pruebas = $facebook->api(array('method'=> 'fql.query','query'=> "SELECT post_id, fromid, text FROM comment WHERE post_id='" . $pru."'",));



echo '<table>';
echo '<tr><th>ID del POST</th>
<th>ID de quien Comento</th>
<th>Comentario</th>
</tr>';
$actor_comen[50]="";
$nombre[50]="";

$z=0; 

foreach ($pruebas as $prueba){
  $actor_comen[$z]= $prueba['fromid'];
  $nombre[$z] =buscar_nombre($actor_comen[$z],$id_nom);
  $z=$z+1;


  echo '<tr>
  <td>'.$prueba['post_id'].'</td>
  <td>'.$prueba['fromid'].'</td>
  <td>'.$prueba['text'].'</td>
  </tr>';
}
echo '</table>';
$lista_simple = array_values(array_unique($nombre));
$result = count($lista_simple)-1


?>

</div>
<br>
La grafica nos muestra la ultima publicacion del grupo de  <strong><?php echo $ctronombre[0]; ?></strong> y solo <strong><?php echo $result; ?></strong> miembros han comentado de <strong><?php echo $con_member; ?></strong>
<br>





<div>

    <?php
    $links1[100]=" ";
    $o=0;
    foreach ($ctronombre as $ctro){

        foreach ($nombre as $nom){


            $o=$o+1;

        }

    }
    //var_dump($links1);

    ?>

    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script>



    // http://blog.thomsonreuters.com/index.php/mobile-patent-suits-graphic-of-the-day/
    var links = [
    {source: "<?php echo $ctronombre[0]; ?>", target: "<?php echo $nombre[0]; ?>", type: "licensing"},
    {source: "<?php echo $ctronombre[0]; ?>", target: "<?php echo $nombre[1]; ?>", type: "licensing"},
    {source: "<?php echo $ctronombre[0]; ?>", target: "<?php echo $nombre[2]; ?>", type: "licensing"},
    {source: "<?php echo $ctronombre[0]; ?>", target: "<?php echo $nombre[3]; ?>", type: "licensing"},
    {source: "<?php echo $ctronombre[0]; ?>", target: "<?php echo $nombre[4]; ?>", type: "licensing"},
    {source: "<?php echo $ctronombre[1]; ?>", target: "sin comentario", type: "resolved"},
    {source: "<?php echo $ctronombre[2]; ?>", target: "sin comentario", type:"resolved"},
    {source: "<?php echo $ctronombre[3]; ?>", target: "sin comentario", type: "resolved"},
    {source: "<?php echo $ctronombre[4]; ?>", target: "sin comentario", type: "resolved"},
    {source: "<?php echo $ctronombre[5]; ?>", target: "sin comentario", type: "resolved"},
    {source: "<?php echo $ctronombre[6]; ?>", target: "sin comentario", type: "resolved"},



     // {source: "", target: "Virginia", type: "resolved"},

     
    //  {source: "Nokia", target: "Pablo", type: "suit"}
    ];

    var nodes = {};

    // Compute the distinct nodes from the links.
    links.forEach(function(link) {
      link.source = nodes[link.source] || (nodes[link.source] = {name: link.source});
      link.target = nodes[link.target] || (nodes[link.target] = {name: link.target});
  });

    var width = 960,
    height = 500;

    var force = d3.layout.force()
    .nodes(d3.values(nodes))
    .links(links)
    .size([width, height])
    .linkDistance(60)
    .charge(-300)
    .on("tick", tick)
    .start();

    var svg = d3.select("body").append("svg")
    .attr("width", width)
    .attr("height", height);

    // Per-type markers, as they don't inherit styles.
    svg.append("defs").selectAll("marker")
    .data(["suit", "licensing", "resolved"])
    .enter().append("marker")
    .attr("id", function(d) { return d; })
    .attr("viewBox", "0 -5 10 10")
    .attr("refX", 15)
    .attr("refY", -1.5)
    .attr("markerWidth", 6)
    .attr("markerHeight", 6)
    .attr("orient", "auto")
    .append("path")
    .attr("d", "M0,-5L10,0L0,5");

    var path = svg.append("g").selectAll("path")
    .data(force.links())
    .enter().append("path")
    .attr("class", function(d) { return "link " + d.type; })
    .attr("marker-end", function(d) { return "url(#" + d.type + ")"; });

    var circle = svg.append("g").selectAll("circle")
    .data(force.nodes())
    .enter().append("circle")
    .attr("r", 6)
    .call(force.drag);

    var text = svg.append("g").selectAll("text")
    .data(force.nodes())
    .enter().append("text")
    .attr("x", 8)
    .attr("y", ".31em")
    .text(function(d) { return d.name; });

    // Use elliptical arc path segments to doubly-encode directionality.
    function tick() {
      path.attr("d", linkArc);
      circle.attr("transform", transform);
      text.attr("transform", transform);
  }

  function linkArc(d) {
      var dx = d.target.x - d.source.x,
      dy = d.target.y - d.source.y,
      dr = Math.sqrt(dx * dx + dy * dy);
      return "M" + d.source.x + "," + d.source.y + "A" + dr + "," + dr + " 0 0,1 " + d.target.x + "," + d.target.y;
  }

  function transform(d) {
      return "translate(" + d.x + "," + d.y + ")";
  }

  </script>


</div>

<?php
/* PHP SDK v4.0.0 */
/* make the API call */
$request = new FacebookRequest(
  $session,
  'GET',
  '/1468449696753793/feed'
);
$response = $request->execute();
$graphObject = $response->getGraphObject();
/* handle the result */


?>

  <!-- Aqui <termina></termina> el dolor de cabeza -->




                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>


   
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <!-- <script src="js/jquery-1.11.0.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="js/bootstrap.min.js"></script> -->

    <!-- Morris Charts JavaScript -->
    <!-- <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
    <script src="js/app.js"></script> -->

</body>

</html>
