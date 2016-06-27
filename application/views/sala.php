<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content">
	<section>
		<div id="container">
			<div id="listar_sala">
				<h1>Lista de salas</h1>
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
					<?php if(isset($salas)) foreach($salas as $sala) { ?>
						<tr>
							<td>
								<?php echo $sala['id']; ?>
							</td>
							<td>
								<?php echo $sala['descricao']; ?>
							</td>
							<?php if($admin === true) { ?>
								<td>
									<form class="inline" method="post" action="<?php echo base_url(); ?>index.php/sala">
										<input type="hidden" name="formulario" value="excluir" />
										<button type="submit" name="id" value="<?php echo $sala['id']; ?>" class="link-button">Excluir</button>
									</form>
								</td>
							<?php } ?>
						</tr>
					<?php } ?>
				</table>
			</div>
			<?php if(isset($admin) && $admin === true) { ?>
				<h1>Alterar sala</h1>
				<form method="post" action="<?php echo base_url(); ?>index.php/sala">
					<input type="hidden" name="formulario" value="alterar" />
					<table cellspacing="10">
						<tr>
							<td>
								<label>Id</label>
							</td>
							<td>
								<input type="number" min="1" name="id" placeholder="Digite o id" required></input>
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
				<h1>Cadastrar nova sala</h1>
				<form method="post" action="<?php echo base_url(); ?>index.php/sala">
					<input type="hidden" name="formulario" value="cadastrar" />
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
			<?php } ?>
		</div>
	</section>
</div>
