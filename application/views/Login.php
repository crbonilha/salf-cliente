<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Tela de Login</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	#container {
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Login</h1>
		<form method="POST" action="">
			<table cellspacing="10">
				<tr>
					<td>
					<label>Login: </label>
					</td>
					<td align="left">
						<input type="text" name="login" id="login">
					</td>
				</tr>
				<tr>
					<td>
						<label>Senha: </label>
					</td>
					<td align="left">
						<input type="password" name="pass" id="password">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" id="enviar" name="enviar">
					</td>
					<td>
						<input type="reset" value="Limpar">
					</td>
				</tr>
			</table>
		</form>
	<br />
</form>
</div>

</body>
</html>