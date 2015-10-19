<?php
/**
 * Searchform.php
 *
 * Template for displaying search form.
 */
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
		<input type="text" class="field form-control" name="s" id="s" placeholder="Search....">
		<span class="input-group-btn">
			<input class="btn btn-default" type="submit" name="submit" id="searchsubmit" value="Search" />
		</span>
	</div><!-- /input-group -->
</form>