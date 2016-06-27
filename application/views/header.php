<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/estilos.css">
	<?php if(isset($estilos) && $estilos !== null) foreach($estilos as $estilo) { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() . '/css/' . $estilo; ?>.css">
	<?php } ?>

	<title><?php echo $titulo; ?></title>
</head>
<body>
	<div class="geral">
		<?php if($titulo != 'Página inicial') {?>
		<div class="header">
			<header>
				<nav>
					<?php if(isset($admin) && $admin === true){ ?>
						<a href="<?php echo base_url(); ?>index.php/professor">Professores</a>
					<?php } ?>
					<a href="<?php echo base_url(); ?>index.php/motivo">Motivos</a>
					<a href="<?php echo base_url(); ?>index.php/sala">Salas</a>
					<a href="<?php echo base_url(); ?>index.php/departamento">Departamentos</a>
					<?php if(isset($admin) && $admin === true){ ?>
						<a href="<?php echo base_url(); ?>index.php/incidencia">Incidências</a>
					<?php } ?>
					<a href="<?php echo base_url(); ?>index.php/reserva">Reservas</a>
					<a href="<?php echo base_url(); ?>index.php/logout">Sair</a>
				</nav>
			</header>
		</div> <?php } ?>
