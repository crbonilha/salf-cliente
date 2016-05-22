<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content">
	<section>
		<div id="container">
			<h1>Lista de departamentos</h1>
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
				<?php if(isset($departamentos)) foreach($departamentos as $departamento) { ?>
					<tr>
						<td>
							<?php echo $departamento['id']; ?>
						</td>
						<td>
							<?php echo $departamento['descricao']; ?>
						</td>
						<?php if($admin === true) { ?>
							<td>
								<form class="inline" method="post" action="<?php echo base_url(); ?>index.php/departamento">
									<input type="hidden" name="excluir" value="excluir" />
									<button type="submit" name="id" value="<?php echo $departamento['id']; ?>" class="link-button">Excluir</button>
								</form>
							</td>
						<?php } ?>
					</tr>
				<?php } ?>
			</table>
			<h1>Alterar departamento</h1>
			<form method="post" action="<?php echo base_url(); ?>index.php/departamento">
				<input type="hidden" name="alterar" value="alterar" />
				<table cellspacing="10">
					<tr>
						<td>
							<label>Id</label>
						</td>
						<td>
							<input type="number" name="id" placeholder="Digite o id" required></input>
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
			<h1>Cadastrar novo departamento</h1>
			<form method="post" action="<?php echo base_url(); ?>index.php/departamento">
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
