<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content">
	<section>
		<div id="container">
			<div id="listar_reserva">
				<h1>Lista de reservas</h1>
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
								<?php echo $reserva['id_horario']; ?>
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
							<input type="number" name="sala" required></input>
						</td>
					</tr>
					<tr>
						<td>
							<label>Motivo</label>
						</td>
						<td>
							<input type="number" name="motivo" required></input>
						</td>
					</tr>
					<tr>
						<td>
							<label>Data</label>
						</td>
						<td>
							<input type="text" name="data" required></input>
						</td>
					</tr>
					<tr>
						<td>
							<label>Hora</label>
						</td>
						<td>
							<input type="number" name="id_horario" required></input>
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
								<input type="number" name="sala" required></input>
							</td>
						</tr>
						<tr>
							<td>
								<label>Motivo</label>
							</td>
							<td>
								<input type="number" name="motivo" required></input>
							</td>
						</tr>
						<tr>
							<td>
								<label>Data</label>
							</td>
							<td>
								<input type="text" name="data" required></input>
							</td>
						</tr>
						<tr>
							<td>
								<label>Hora</label>
							</td>
							<td>
								<input type="number" name="id_horario" required></input>
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
