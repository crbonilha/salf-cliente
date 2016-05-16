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
								<form method="post" action="<?php echo base_url(); ?>index.php/motivo" class="inline">
									<input type="hidden" name="excluir"/>
									<button type="submit" name="id_motivo" value="<?php echo $motivo['id_motivo']; ?>" class="link-button">Excluir</button>
								</form>
							</td>
						<?php } ?>
					</tr>
				<?php } ?>
			</table>
			<h1>Alterar motivo</h1>
			<form method="post" action="<?php echo base_url(); ?>index.php/motivo">
				<input type="hidden" name="alterar" value="alterar" />
				<table cellspacing="10">
					<tr>
						<td>
							<label>Id</label>
						</td>
						<td>
							<input type="number" name="id_motivo" placeholder="Digite o id" required></input>
						</td>
					</tr>
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
			<h1>Cadastrar novo motivo</h1>
			<form method="post" action="<?php echo base_url(); ?>index.php/motivo">
				<input type="hidden" name="cadastrar" value="cadastrar" />
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