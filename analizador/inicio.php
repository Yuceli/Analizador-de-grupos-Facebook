<!DOCTYPE html>
<html lang="en">
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
                        <a href="#">Ir a aplicacion</a>
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
                    <li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Introducción</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> Análisis de grupo</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-table"></i> Análisis grupal</a>
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
                <div class="page-header">
                    <h1>Analizador</h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Los sistemas desarrollados con herramientas para analizar la interacción son usados para evaluar el proceso de colaboración y mejorar métodos computacionales para apoyar y asistir al proceso de aprendizaje en grupo.
                          Facebook por sus características podría ser complementado con una aplicación que nos permita evaluar un grupo en alguna actividad colaborativas.</p>

                      </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                            <ul class="nav nav-pills nav-justified thumbnail">
                                <li><a href="#">
                                    <h4 class="list-group-item-heading">Paso 1</h4>
                                    <p class="list-group-item-text">Iniciar sesión en Facebook</p>
                                </a></li>
                                <li class="active"><a href="#">
                                    <h4 class="list-group-item-heading">Paso 2</h4>
                                    <p class="list-group-item-text">Ser administrador de un grupo público en Facebook</p>
                                </a></li>
                                <li class=""><a href="#">
                                    <h4 class="list-group-item-heading">Paso 3</h4>
                                    <p class="list-group-item-text">Identificar el ID del grupo en Facebook</p>
                                </a></li>
                            </ul>
                    </div>
                </div>

                <br>

                <div class="row">

                    <div class="alert alert-info">
                        <strong>Info:</strong> Si usted ya introdujo el ID y ha inicio sesión en la aplicación podra navegar sobre cualquier opción de la aplicación.
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h5>Introduzca el ID del grupo de Facebook.</h5>
                        <form action="aplication.php" method="GET" class="form-inline">
                            <div class="form-group">
                                <label class="sr-only" for="">ID del Grupo</label>
                                <input type="text" name="gid" class="form-control" placeholder="Ingrese un ID valido"  required>
                                <!--<input type="text" class="form-control" id="fb-group-id-input" placeholder="Ingrese un id valido">-->
                            </div>
                            <input type="submit" name="Enviar" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
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
