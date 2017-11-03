<!DOCTYPE html>
<html>


<head>
	<!--Título y la imagen-->

  <meta charset="ISO-8859-1">
  <title>PG 101 Login</title>
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
  <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
  <script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
  <script src="js/auth/login.js"></script>
</head>
<body style="background-color: #0060ae">

	<ons-navigator id="myNavigator" page="login.html"></ons-navigator>
  <!-- Página de logeo -->
  <template id="login.html">
	<ons-page id="login">
		
	<style>
		.page__content
		{
			background: #0458a0 !important;
		}
		.button
		{
			background: rgba(24,31,194,0.23);
		}
	</style>
		<div>
			<center><img src="img/poli_g.jpg" style="width:70%;margin-top:100px"/></center>
		</div>
		  <div style="text-align: center; margin-top: 50px;">
        <FONT FACE="impact" SIZE=6 COLOR="white">PoliGran 101</FONT>

</head><style>


body {text-align:center;}
 form {margin: 0 auto;width: 500px;}!
input {padding:10px; font-size:20;}
</style></head>
</body>


<form action="ldap.php" method="post">
	<input type="text"  name="username" /><br>
	<input type="password" name="password" /><br>
	<input type="submit" value="Login"  />

</form>
</body>
</html>


