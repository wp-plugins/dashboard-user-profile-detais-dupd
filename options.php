<div class="wrap">

    <?php screen_icon(); ?>

	<form action="options.php" method="post" id="<?php echo $plugin_id; ?>_options_form" name="<?php echo $plugin_id; ?>_options_form">

	<?php settings_fields($plugin_id.'_options'); ?>

    <h2>DUPD Plugin Option &raquo; Settings</h2>
    <table class="widefat">
		<thead>
		   <tr>
			 <th><input type="submit" name="submit" value="Save Settings" class="button-primary" style="padding:8px;" /></th>
		   </tr>
		</thead>
		<tfoot>
		   <tr>
			 <th><input type="submit" name="submit" value="Save Settings" class="button-primary" style="padding:8px;" /></th>
		   </tr>
		</tfoot>
		<tbody>
		   <tr>
			 <td style="padding:25px;font-family:Verdana, Geneva, sans-serif;color:#666;">
                 <label for="kkpo_quote">
<table border="0px" width="40%">
  <tr>
    <td width="20%">                     <p>Username Template Title</p>
                     <p><input type="text" name="dup1" value="<?php echo get_option('dup1'); ?>" /></p>                     <p>E-mail Template Title</p>
                     <p><input type="text" name="dup2" value="<?php echo get_option('dup2'); ?>" /></p>                     <p>Full Name Template Title</p>

                     <p><input type="text" name="dup3" value="<?php echo get_option('dup3'); ?>" /></p>                     <p>Join Date Template Title</p>

                     <p><input type="text" name="dup4" value="<?php echo get_option('dup4'); ?>" /></p></td>
    <td width="20%">                     <p>Website Template Title</p>

                     <p><input type="text" name="dup5" value="<?php echo get_option('dup5'); ?>" /></p>
                     <p>Avatar Edit Link with http://</p>

                     <p><input type="text" name="link" value="<?php echo get_option('link'); ?>" /></p>                     <p>Avatar Edit Link Title</p>

                     <p><input type="text" name="title" value="<?php echo get_option('title'); ?>" /></p>
					 <script type='text/javascript' language='Javascript'>
</script>

</div>

