<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="footer">
		<footer>
			SALF. Todos os direitos reservados.
			<?php if(isset($debug) && $debug == true) { ?>
				<?php if(isset($get_http) && $get_http['request'] !== null && $get_http['response'] != null) { ?>
					<br/>
					<a href="#" onclick="window.alert('<?php echo $get_http['request']; ?>');">Get request</a>&nbsp;
					<a href="#" onclick="window.alert('<?php echo $get_http['response']; ?>');">Get response</a>&nbsp;
				<?php } ?>
				<?php if(isset($crud_http) && $crud_http['request'] !== null && $crud_http['response'] != null) { ?>
					<a href="#" onclick="window.alert('<?php echo $crud_http['request']; ?>');">Crud request</a>&nbsp;
					<a href="#" onclick="window.alert('<?php echo $crud_http['response']; ?>');">Crud response</a>
				<?php } ?>
			<?php } ?>
		</footer>
	</div>
	<?php if(isset($get_http) && isset($get_http['response_body_ne'])) {
		$erro = json_decode($get_http['response_body_ne'], true);
		if(isset($erro['error'])) { ?>
			<script>
				window.alert('<?php echo $erro['error']; ?>');
			</script>
	<?php }
	} ?>
	<?php if(isset($crud_http) && isset($crud_http['response_body_ne'])) {
		$erro = json_decode($crud_http['response_body_ne'], true);
		if(isset($erro['error'])) {
			$erro['error'] = str_replace("'", "\"", $erro['error']); ?>
			<script>
				window.alert('<?php echo $erro['error']; ?>');
			</script>
	<?php }
	} ?>
</div>
</body>
</html>
