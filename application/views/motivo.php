<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content">
	<section>
		<div id="container">
			<section class="box right">
				<h1>Lista de motivos</h1>
					<div id="listar_motivo">
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
							<?php if(isset($motivos)) foreach($motivos as $motivo) { ?>
								<tr>
									<td>
										<?php echo $motivo['id']; ?>
									</td>
									<td>
										<?php echo $motivo['descricao']; ?>
									</td>
									<?php if($admin === true) { ?>
										<td>
											<form class="inline" method="post" action="<?php echo base_url(); ?>index.php/motivo">
												<input type="hidden" name="formulario" value="excluir" />
												<button type="submit" name="id" value="<?php echo $motivo['id']; ?>" class="link-button">Excluir</button>
											</form>
										</td>
									<?php } ?>
								</tr>
							<?php } ?>
						</table>
					</div>
			</section>
			<section class="box left">
				<h1>Alterar motivo</h1>
				<form method="post" action="<?php echo base_url(); ?>index.php/motivo">
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
				<h1>Cadastrar novo motivo</h1>
				<form method="post" action="<?php echo base_url(); ?>index.php/motivo">
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
			</section>
		</div>
	</section>
</div>
