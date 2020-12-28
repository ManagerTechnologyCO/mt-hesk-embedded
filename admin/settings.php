<?php 
if(isset($_POST)){
	if(isset($_POST['mt_hesk_embedded_site_url'])){
		update_option('mt_hesk_embedded_site_url', $_POST['mt_hesk_embedded_site_url']);
	}
}
$mt_hesk_embedded_site_url = get_option('mt_hesk_embedded_site_url');
?>
<style>
.welcome-panel .welcome-panel-column:first-child {
	width:55%;
}
</style>
<div class="wrap">
	<h1 class="wp-heading-inline"><?= get_admin_page_title(); ?> </h1>
	<div id="welcome-panel" class="welcome-panel">
		<div class="welcome-panel-content">
			<div class="welcome-panel-column-container">
				<div class="welcome-panel-column">
					<form method="post" action="" novalidate="novalidate">
						<table class="form-table" role="presentation">
							<tbody>
								<tr>
									<th scope="row"><label for="home">Dirección del sitio (URL)</label></th>
									<td>
										<input name="mt_hesk_embedded_site_url" type="url" id="mt_hesk_embedded_site_url" aria-describedby="mt_hesk_embedded_site_url" value="<?= $mt_hesk_embedded_site_url; ?>" class="regular-text code">
										<p class="description" id="mt_hesk_embedded_site_url-description">Introduce aquí la dirección del <a href="#">Sitio de soporte.</a>.</p>
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
</div>