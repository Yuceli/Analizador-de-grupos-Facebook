<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<body>
<div id="fb-root">

<!--contenido de la aplicacion aca-->
<input type="button" id="login" value="click to login"/>

</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js">
</script>

<script type="text/javascript" >
window.fbAsyncInit = function(){
FB.init({
	appId : '593740170716314',
	status: true,
	cookie: true,
	xfbml:true
		
});
/*fb javascript aca. será leido asincronicamente */

};






(function() {
  var e=document.createElement('script');
	  e.type= 'text/javascript';
	  e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
	  e.async= true;
	  document.getElementById('fb-root').appendChild(e);
	 
}());


</script>

</body>




</html>
