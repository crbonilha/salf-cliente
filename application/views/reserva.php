<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content">
	<section>
		<div id="container">
			<section class="box right">
				<h1>Lista de reservas</h1>
				<div id="listar_reserva">
					<table cellspacing="10">
						<tr>
							<td>
								<label>Id</label>
							</td>
							<td>
								<label>Sala</label>
							</td>
							<td>
								<label>Motivo</label>
							</td>
							<td>
								<label>Data</label>
							</td>
							<td>
								<label>Hora</label>
							</td>
							<?php if($admin === true) { ?>
								<td></td>
							<?php } ?>
						</tr>
						<?php if(isset($reservas)) foreach($reservas as $reserva) { ?>
							<tr>
								<td>
									<?php echo $reserva['id']; ?>
								</td>
								<td>
									<?php echo $reserva['sala']; ?>
								</td>
								<td>
									<?php echo $reserva['motivo']; ?>
								</td>
								<td>
									<?php echo $reserva['data']; ?>
								</td>
								<td>
									<?php echo $reserva['horario']; ?>
								</td>
								<?php if($admin === true) { ?>
									<td>
										<form class="inline" method="post" action="<?php echo base_url(); ?>index.php/reserva">
											<input type="hidden" name="formulario" value="excluir" />
											<button type="submit" name="id" value="<?php echo $reserva['id']; ?>" class="link-button">Excluir</button>
										</form>
									</td>
								<?php } ?>
							</tr>
						<?php } ?>
					</table>
				</div>
			</section>
			<section class="box left">
				<h1>Alterar reserva</h1>
				<form method="post" action="<?php echo base_url(); ?>index.php/reserva">
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
								<label>Sala</label>
							</td>
							<td>
								<select name="sala">
									<?php if(isset($salas)) foreach($salas as $sala) { ?>
										<option value="<?php echo $sala['id']; ?>"><?php echo $sala['descricao']; ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<label>Motivo</label>
							</td>
							<td>
								<select name="motivo">
									<?php if(isset($motivos)) foreach($motivos as $motivo) { ?>
										<option value="<?php echo $motivo['id']; ?>"><?php echo $motivo['descricao']; ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<label>Data</label>
							</td>
							<td>
								<input type="date" name="data" required></input>
							</td>
						</tr>
						<tr>
							<td>
								<label>Hora</label>
							</td>
							<td>
								<select name="id_horario">
									<?php if(isset($horarios)) foreach($horarios as $horario) { ?>
										<option value="<?php echo $horario['id']; ?>"><?php echo $horario['descricao']; ?></option>
									<?php } ?>
								</select>
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
				<h1>Cadastrar nova reserva</h1>
					<form method="post" action="<?php echo base_url(); ?>index.php/reserva">
						<input type="hidden" name="formulario" value="cadastrar" />
						<table cellspacing="10">
							<tr>
								<td>
									<label>Sala</label>
								</td>
								<td>
									<select name="sala">
										<?php if(isset($salas)) foreach($salas as $sala) { ?>
											<option value="<?php echo $sala['id']; ?>"><?php echo $sala['descricao']; ?></option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<label>Motivo</label>
								</td>
								<td>
									<select name="motivo">
										<?php if(isset($motivos)) foreach($motivos as $motivo) { ?>
											<option value="<?php echo $motivo['id']; ?>"><?php echo $motivo['descricao']; ?></option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<label>Data</label>
								</td>
								<td>
									<input type="date" name="data" required></input>
								</td>
							</tr>
							<tr>
								<td>
									<label>Hora</label>
								</td>
								<td>
									<select name="id_horario">
										<?php if(isset($horarios)) foreach($horarios as $horario) { ?>
											<option value="<?php echo $horario['id']; ?>"><?php echo $horario['descricao']; ?></option>
										<?php } ?>
									</select>
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
