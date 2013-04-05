<?php
/*****************************************
COPYRIGHT
*****************************************/
/*
Copyright 2013  Banti Album Proofing  (email : info@bantialbumproofing.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<div class="wrap">
  <?php    echo "<h2>" . __( 'Banti Login' ) . "</h2>"; ?>
  <?php
global $wpdb;
if($_REQUEST['username']!="" && $_REQUEST['password'] !=""){
	$wpdb->query("DELETE FROM ".BANTI_TABLE_PREFIX."settings_tbl WHERE username !=''");
	
	$wpdb->query("INSERT INTO ".BANTI_TABLE_PREFIX."settings_tbl(username, password)
   		 VALUES('".$_REQUEST['username']."', '".$_REQUEST['password']."')");
	echo '<div class="updated"><p><strong>Settings Saved</strong>! <a href="admin.php?page=banti-album-proofing/banti-album-proofing.php">Go to Your Banti Dashboard</a></p></div>';

}
$row = $wpdb->get_row("SELECT * FROM ".BANTI_TABLE_PREFIX."settings_tbl WHERE username!='' ORDER BY id DESC");

?>
  <form method="post" action="admin.php?page=settings">
    <?php if($row->username=="") { ?>
    <div class="error">
      <p style="font-size:18px;line-height:24px;">Don't have a Banti account? <a href="http://www.bantialbumproofing.com/register" target="_blank" class="button button-secondary"><strong>Get one now!</strong></a></p>
    </div>
    <?php } ?>
    <table class="form-table">
      <tbody>
        <tr valign="top">
          <th scope="row"><label for="username">Banti Username</label></th>
          <td><input name="username" type="text" id="username" value="<?php echo $row->username; ?>" class="regular-text"></td>
        </tr>
        <tr valign="top">
          <th scope="row"><label for="password">Banti Password</label></th>
          <td><input name="password" type="password" id="password" value="<?php echo $row->password; ?>" class="regular-text"></td>
        </tr>
      </tbody>
    </table>
    <p class="submit">
      <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
    </p>
  </form>
</div>
