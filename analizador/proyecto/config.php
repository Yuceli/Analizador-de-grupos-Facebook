<?php
require 'src/facebook.php';
/*creamos la instancia de la apricacion*/
$facebook = new Facebook(array(
  'appId'  => '593740170716314',
  'secret' => '3424e68df54b8376f92816f27aba6a69',
  'cookie' => true,
));
$appBaseUrl = 'http://apps.facebook.com/analizador';

  ?>