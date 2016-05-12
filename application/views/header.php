<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/estilos.css">
	<?php if(isset($estilos) && $estilos !== null) foreach($estilos as $estilo) { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/' . $estilo; ?>.css">
	<?php } ?>

	<title><?php echo $titulo; ?></title>
</head>
<body>
	<div class="geral">
		<div class="header">
			<header>
				<nav>
					<a href="<?php echo base_url(); ?>">Página inicial</a>
					<a href="<?php echo base_url(); ?>index.php/login">Login</a>
					<a href="<?php echo base_url(); ?>index.php/motivo">Motivos</a>
				</nav>
			</header>
		</div>