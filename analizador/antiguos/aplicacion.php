<html>
<link rel="stylesheet" href="style.css">
<body>
<?php include("menu1.php");?>

<div id="contenido">
<h2>Bienvenidos!!</h2>
<p>
Los sistemas desarrollados con herramientas para analizar la interacción son usados para evaluar el proceso de colaboración y mejorar métodos computacionales para apoyar y asistir al proceso de aprendizaje en grupo. 
<br><br>
Facebook por sus características podría ser complementado con una aplicación que nos permita evaluar un grupo en alguna actividad colaborativas.
</p>
<p>
Lo primero que debemos hacer es haber iniciado sesión en Facebook.
</p>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=593740170716314";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="true" perms="read_stream, publish_stream, manage_friendlists, publish_stream, publish_actions, user_groups, friends_groups"></div>
</div>
<p> Segundo, idenficar el ID del grupo de Facebook al que se pertenece y se es 
  administradorl. </p>
<div id="imagen"> 
  <p><img src="idgrupo.png" width="527" height="74"></p>
  <p>Capturar la clave, y enviar para realizar unas consultas y la gr&aacute;fica.</p>
</div>
<form action="indexi.php" method="post">
Clave: <input type="text" name="clave" required>

<input type="submit" name="Enviar">
</form>


</body>
<?php include("pie.php");?>

</html>