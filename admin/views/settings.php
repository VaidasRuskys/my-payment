<div class="wrap">
	<h1>My payment settings</h1>

	<form method="post" action="">
		<table class="form-table">
			<tr valign="top">
				<th scope="row">New Option Name</th>
				<td><input type="text" name="my_payment_key" value="<?php echo esc_attr( get_option('my_payment_key') ); ?>" /></td>
			</tr>
		</table>

		<?php submit_button(); ?>

	</form>
</div>