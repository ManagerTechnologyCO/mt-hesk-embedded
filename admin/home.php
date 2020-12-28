<?php 
if(isset($_REQUEST)){
	if(isset($_REQUEST['mt_hesk_embedded_site_url'])){
		update_option('mt_hesk_embedded_site_url', $_REQUEST['mt_hesk_embedded_site_url']);
	}
	if(isset($_REQUEST['welcome'])){
		update_option('mt_hesk_embedded_welcome_message', (int) $_REQUEST['mt_hesk_embedded_welcome_message']);
	}
}
$mt_hesk_embedded_site_url = get_option('mt_hesk_embedded_site_url');
$mt_hesk_embedded_welcome_message = get_option('mt_hesk_embedded_welcome_message');
?>
<style>
.welcome-panel .welcome-panel-column:first-child {
	width:55%;
}
</style>
<div class="wrap">
	<h1 class="wp-heading-inline"><?= get_admin_page_title(); ?> </h1>
	<?php 
	if($mt_hesk_embedded_welcome_message == 1){
		?>
		<div id="welcome-panel" class="welcome-panel">
			<a class="welcome-panel-close" href="?page=mt_hs_embedded&welcome=0" aria-label="Descartar el panel de bienvenida">Descartar</a>
			<div class="welcome-panel-content">
				<h2>¡Bienvenido!</h2>
				<p class="about-description">Configura la URL para que tus complemento funcione correctamente.</p>
				<div class="welcome-panel-column-container">
					<div class="welcome-panel-column">
						<h3>Primeros pasos</h3>
						<form method="post" action="" novalidate="novalidate">
							<table class="form-table" role="presentation">
								<tbody>
									<tr>
										<th scope="row"><label for="home">Dirección del sitio (URL)</label></th>
										<td>
											<input name="mt_hesk_embedded_site_url" type="url" id="mt_hesk_embedded_site_url" aria-describedby="mt_hesk_embedded_site_url" value="<?= $mt_hesk_embedded_site_url; ?>" class="regular-text code">
											<p class="description" id="mt_hesk_embedded_site_url-description">Introduce aquí la dirección del <a href="https://www.hesk.com/">Sitio de soporte.</a>.</p>
										</td>
									</tr>
								</tbody>
							</table>
							<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Guardar cambios"></p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php 
	}
	?>
	<div class="card" style="width:96%;max-width:96%;margin-left:2%;">
		<div class="card-body">
			<div  class="widget widget_text">
				<div class="widget-wrap">
					<h4 class="widgettitle">Códigos cortos</h4>
					<p>Hemos organizado unos codigos rapidos para que puedas agregar todas las funciones de Hesk a tu sitio web.</p>
					<table class="wp-list-table widefat fixed striped pages">
						<thead>
							<tr>
								<th>Enlace</th>
								<th>Codigo</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Agregar página principal</td>
								<td>[mt_hesk_shortcode_home]</td>
							</tr>
							<tr>
								<td>Consola Staff</td>
								<td>[mt_hesk_shortcode_console]</td>
							</tr>
							<tr>
								<td>Crear Ticket</td>
								<td>[mt_hesk_shortcode_add]</td>
							</tr>
							<tr>
								<td>Buscar Ticket</td>
								<td>[mt_hesk_shortcode_search]</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>