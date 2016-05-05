<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="container">
	<table>
		<th>
			<td>Id</td>
			<td>Descrição</td>
		</th>
		<?php foreach($motivos as $motivo) { ?>
		<tr>
			<td><?php echo $motivo['id_motivo']; ?></td>
			<td><?php echo $motivo['descricao']; ?></td>
		</tr>
		<?php } ?>
	</table>
</div>