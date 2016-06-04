<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="footer">
		<footer>
			SALF. Todos os direitos reservados.
			<?php if(isset($debug) && $debug == true) { ?>
				<?php if(isset($get_http)) { ?>
					<br/>
					<a href="#" onclick="window.alert('<?php echo $get_http['request']; ?>');">Get request</a>&nbsp;
					<a href="#" onclick="window.alert('<?php echo $get_http['response']; ?>');">Get response</a>&nbsp;
				<?php } ?>
				<?php if(isset($crud_http)) { ?>
					<a href="#" onclick="window.alert('<?php echo $crud_http['request']; ?>');">Crud request</a>&nbsp;
					<a href="#" onclick="window.alert('<?php echo $crud_http['response']; ?>');">Crud response</a>
				<?php } ?>
			<?php } ?>
		</footer>
	</div>
</div>
</body>
</html>
