<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content">
	<section>
		<div id="container">
			<h1>Lista de motivos</h1>
			<table cellspacing="10">
				<tr>
					<td>
						<label>Id</label>
					</td>
					<td>
						<label>Descrição</label>
					</td>
					<?php if($admin === true) { ?>
						<td></td>
					<?php } ?>
				</tr>
				<?php foreach($motivos as $motivo) { ?>
					<tr>
						<td>
							<?php echo $motivo['id_motivo']; ?>
						</td>
						<td>
							<?php echo $motivo['descricao']; ?>
						</td>
						<?php if($admin === true) { ?>
							<td>
								<a href="#">Excluir</a>
							</td>
						<?php } ?>
					</tr>
				<?php } ?>
			</table>
			<h1>Cadastrar novo motivo</h1>
			<form method="POST" action="#">
				<table cellspacing="10">
					<tr>
						<td>
							<label>Descrição</label>
						</td>
						<td>
							<input type="text" name="descricao" placeholder="Digite a descrição" required></input>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" id="cadastrar"></input>
						</td>
						<td>
							<input type="reset" id="limpar"></input>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</section>
</div>