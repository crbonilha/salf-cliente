<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content">
	<section>
		<div id="container">
			<h1>Login</h1>
				<form method="POST" action="<?php echo base_url();?>index.php/envia">
					<input type="hidden" name="formulario" value="execLogin">
					<table cellspacing="10">
						<tr>
							<td>
							<label>Login: </label>
							</td>
							<td align="left">
								<input type="text" name="login" id="login" placeholder="Digite seu login aqui">
							</td>
						</tr>
						<tr>
							<td>
								<label>Senha: </label>
							</td>
							<td align="left">
								<input type="password" name="senha" id="senha" placeholder="Digite sua senha aqui">
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" id="enviar">
							</td>
							<td>
								<input type="reset" id="limpar" value="Limpar">
							</td>
						</tr>
					</table>
				</form>
		</div>
	</section>
</div>