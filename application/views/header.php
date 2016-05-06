<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/estilos.css">
	<title><?php echo $titulo; ?></title>
</head>
<body>
	<div class="geral">
		<div class="header">
			<header>
				<?php if ($titulo==""){
					echo $titulo;
				}?>
			</header>
		</div>