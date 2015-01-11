<div id="wpbody-content" aria-label="Main content" tabindex="0" style="overflow: hidden;">
<div class="wrap">
  <?php    echo "<h2>" . __( 'Banti Login' ) . "</h2>"; ?>
  <?php
global $wpdb;
if($_REQUEST['username']!=""){
	$wpdb->query("DELETE FROM ".BANTI_TABLE_PREFIX."settings_tbl WHERE username !=''");
	
	$wpdb->query("INSERT INTO ".BANTI_TABLE_PREFIX."settings_tbl(username, password)
   		 VALUES('".$_REQUEST['username']."', '')");
	echo '<div class="updated"><p><strong>Settings Saved</strong>! <a href="admin.php?page=banti-album-proofing/banti-album-proofing.php">Go to Your Banti Dashboard</a></p></div>';

}
$row = $wpdb->get_row("SELECT * FROM ".BANTI_TABLE_PREFIX."settings_tbl WHERE username!='' ORDER BY id DESC");

?>

  <form method="post" action="admin.php?page=settings">
    <?php if($row->username=="") { ?>
    <div class="error">
      <p style="font-size:18px;line-height:24px;">I don't have a Banti account (<a href="https://www.bantialbumproofing.com/" target="_blank">www.bantialbumproofing.com</a>)? <a href="https://www.bantialbumproofing.com/register" target="_blank" class="button button-secondary"><strong>Get one now!</strong></a></p>
    </div>
    <?php } ?>
    <div class="dashboard-widgets-wrap">
<div id="dashboard-widgets" class="metabox-holder columns-1">
    <div class="postbox">
<h3 class="hndle"><span>I already have an active account on Banti</span></h3>
<div class="inside">
<p>If you already <strong>have</strong> an account on <a href="https://www.bantialbumproofing.com/" target="_blank">Banti</a>, please enter your username (not email).</p>
	
	<table class="form-table">
      <tbody>
        <tr valign="top">
          <th scope="row"><label for="username">Banti Username</label></th>
          <td><input name="username" type="text" id="username" value="<?php echo $row->username; ?>" class="regular-text"></td>
        </tr>
        <!--<tr valign="top">
          <th scope="row"><label for="password">Banti Password</label></th>
          <td><input name="password" type="password" id="password" value="<?php echo $row->password; ?>" class="regular-text"></td>
        </tr>-->
      </tbody>
    </table>
    <p class="submit">
      <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
    </p>
	
	</div>
</div>
    
 </div>
</div>   
    
  </form>
   
</div><!--/.wrap-->
</div>
