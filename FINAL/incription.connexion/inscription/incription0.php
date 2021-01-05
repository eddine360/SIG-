<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> inscription</title>
		 <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
	<style>
		body {
		 background-image: url("img/img.jpg");
		 background-color: #cccccc;
		}
	
		.center_div{
			margin: 0 auto;
			width:80% /* value of your choice which suits your alignment */
		}

	</style>
		<meta name="author" content="eddine360" />
		<!-- Date: 2017-04-06 -->
	</head>
	
	<body>
		<!--saisir nouveau utilisateur--> 
		<div class="text-center">
			inscrivez vous.  <br />
			<form name="frm" action="./enr1.php" method="post" >
			login <br>
			<input type="text" name="zs_ident" required /><br />
			Mot de passe <br>
			<input type="password" name="zs_mdp" required /><br/><br />
			 <input class="btn btn-success" type="submit" value="continuer" />
		</div>

	</body>
</html>

