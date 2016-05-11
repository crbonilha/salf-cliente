<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="container">
	<table>
		<th>
			<td>Id</td>
			<td>Descrição</td>
			<?php if($admin === true) { ?>
				<td></td>
			<?php } ?>
		</th>
		<?php foreach($motivos as $motivo) { ?>
		<tr>
			<td><?php echo $motivo['id_motivo']; ?></td>
			<td><?php echo $motivo['descricao']; ?></td>
			<?php if($admin === true) { ?>
				<td><a href="#">Excluir</a></td>
			<?php } ?>
		</tr>
		<?php } ?>
	</table>
	<hr/>
	<div>
		<form method="POST" action="#">
			<p style="text-align: center;">Cadastrar novo motivo</p>
			<label>
				Descrição: 
				<input type="text" name="descricao" required></input>
				<br/>
				<input type="submit" id="cadastrar"></input>
			</label>
		</form>
	</div>
</div>