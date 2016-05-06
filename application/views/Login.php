<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content">
	<section>
		<div id="container">
			<h1>Login</h1>
				<form method="POST" action="<?php echo base_url();?>index.php/envia">
					<table cellspacing="10">
						<tr>
							<td>
							<label>Login: </label>
							</td>
							<td align="left">
								<input type="text" name="login" id="login">
							</td>
						</tr>
						<tr>
							<td>
								<label>Senha: </label>
							</td>
							<td align="left">
								<input type="password" name="senha" id="senha">
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" id="enviar" name="enviar">
							</td>
							<td>
								<input type="reset" value="Limpar">
							</td>
						</tr>
					</table>
				</form>
		</div>
	</section>
</div>