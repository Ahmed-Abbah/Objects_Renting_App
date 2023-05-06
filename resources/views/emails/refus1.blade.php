
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Confirmation Email</title>
	<style type="text/css">
		/* Add styles here */
		body {
			font-family: Arial, sans-serif;
			background-color: #f5f5f5;
			padding: 20px;
		}
		.container {
			max-width: 600px;
			margin: 0 auto;
			background-color: #ffffff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
		}
		h1, h2 {
			text-align: center;
			color: #ff5722;
		}
		h2 {
			margin-top: 30px;
			margin-bottom: 20px;
		}
		p {
			font-size: 16px;
			line-height: 1.5;
			color: #333333;
			margin-bottom: 20px;
		}

		.ii a[href] {
  			color: #ffffff;
		}

		.btn {
			display: inline-block;
			background-color: #ff5722;
			color: #ffffff;
			padding: 10px 20px;
			border-radius: 5px;
			text-decoration: none;
			font-size: 16px;
			transition: background-color 0.3s ease;
		}
		.btn:hover {
			background-color: #252525;
		}
		.footer {
			text-align: center;
			color: #777777;
			font-size: 12px;
			margin-top: 30px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Email de Refus</h1>
		<p>Cher(e) Partenaire {{$data_partenaire['namepart'] }} {{$data_partenaire['prenompart'] }}</p>
		<p>Vous avez refusez l'empreint de l'objet suivant.</p>
		
		<p>Détails de l'objet :</p>
		<ul>
			<li>Titre : {{ $data['titre'] }}</li>
			<li>Prix : {{ $data['prix'] }}</li>
		</ul>
	<p></p>
	<p>Si vous avez des questions ou des préoccupations, n'hésitez pas à nous contacter.</p>
	<p>Cordialement,</p>
	<p>Shareit</p>
	<center>
	<p><a href="127.0.0.1:8000" class="btn">Visitez Notre Site Web</a></p>
	</center>
	<div class="footer">
		<p>Vous recevez cet email car vous l'avez demandé sur notre site web. Si vous n'avez pas effectué cette demande, veuillez ignorer ce message.</p>
		<p>© Shareit. Tous droits réservés.</p>
	</div>
</div>

</body>
</html>