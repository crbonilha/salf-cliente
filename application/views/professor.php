<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content">
	<section>
		<div id="container">
			<h1>Lista de professores</h1>
			<table cellspacing="10">
				<tr>
					<td>
						<label>Id</label>
					</td>
					<td>
						<label>Nome</label>
					</td>
					<td>
						<label>Departamento</label>
					</td>
					<td>
						<label>E-mail</label>
					</td>
					<?php if($admin === true) { ?>
						<td></td>
					<?php } ?>
				</tr>
				<?php if(isset($professores)) foreach($professores as $professor) { ?>
					<tr>
						<td>
							<?php echo $professor['id']; ?>
						</td>
						<td>
							<?php echo $professor['nome']; ?>
						</td>
						<td>
							<?php echo $professor['departamento']; ?>
						</td>
						<td>
							<?php echo $professor['email']; ?>
						</td>
						<?php if($admin === true) { ?>
							<td>
								<form class="inline" method="post" action="<?php echo base_url(); ?>index.php/professor">
									<input type="hidden" name="excluir" value="excluir" />
									<button type="submit" name="id" value="<?php echo $professor['id']; ?>" class="link-button">Excluir</button>
								</form>
							</td>
						<?php } ?>
					</tr>
				<?php } ?>
			</table>
			<h1>Alterar professor</h1>
			<form method="post" action="<?php echo base_url(); ?>index.php/professor">
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
							<label>Nome</label>
						</td>
						<td>
							<input type="text" name="nome" placeholder="Digite o nome" required></input>
						</td>
					</tr>
					<tr>
						<td>
							<label>Senha</label>
						</td>
						<td>
							<input type="password" name="senha" placeholder="Digite a nova senha" required></input>
						</td>
					</tr>
					<tr>
						<td>
							<label>E-mail</label>
						</td>
						<td>
							<input type="email" name="email" placeholder="Digite o e-mail" required></input>
						</td>
					</tr>
					<tr>
						<td>
							<label>Departamento</label>
						</td>
						<td>
							<select name="id_departamento">
								<?php if(isset($departamentos)) foreach($departamentos as $departamento) { ?>
									<option value="<?php echo $departamento['id']; ?>"><?php echo $departamento['descricao']; ?></option>
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
			<h1>Cadastrar novo professor</h1>
			<form method="post" action="<?php echo base_url(); ?>index.php/professor">
				<input type="hidden" name="cadastrar" value="cadastrar" />
				<table cellspacing="10">
					<tr>
						<td>
							<label>Nome</label>
						</td>
						<td>
							<input type="text" name="nome" placeholder="Digite o nome" required></input>
						</td>
					</tr>
					<tr>
						<td>
							<label>Senha</label>
						</td>
						<td>
							<input type="password" name="senha" placeholder="Digite a senha" required></input>
						</td>
					</tr>
					<tr>
						<td>
							<label>E-mail</label>
						</td>
						<td>
							<input type="email" name="email" placeholder="Digite o email" required></input>
						</td>
					</tr>
					<tr>
						<td>
							<label>Departamento</label>
						</td>
						<td>
							<select name="id_departamento">
								<?php if(isset($departamentos)) foreach($departamentos as $departamento) { ?>
									<option value="<?php echo $departamento['id']; ?>"><?php echo $departamento['descricao']; ?></option>
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
		</div>
	</section>
</div>
