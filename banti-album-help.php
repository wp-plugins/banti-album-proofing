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
<style>
.wrap p {
	margin-bottom: 40px;
}
</style>
<div class="wrap">
  <h2>Banti Album Proofing Help</h2>
  <h3>What is Banti Album Proofing</h3>
  <p>Banti Album Proofing is an online album proofing solution for wedding and portrait photographers. You can learn more at <a href="http://www.bantialbumproofing.com" target="_blank">http://www.bantialbumproofing.com</a><br>
  </p>
  <h3>What does Banti's Wordpress Plugin do?</h3>
  <p>This plugin allows you to manage your client's wedding albums from within Wordpress instead of <a href="http://www.bantialbumproofing.com" target="_blank">Banti's website.</a><br>
  </p>
  <h3>Do I have to have an account with Banti to use this plugin?</h3>
  <p>Yes! If you don't have an account you can register for a free trial at <a href="http://www.bantialbumproofing.com/register">http://www.bantialbumproofing.com/register</a><br>
  </p>
  <h3>How do I create a proofing page for my clients?</h3>
  <div style="color:#666; border:1px solid #eee; background:#f8f8f8; padding:10px;"><strong>IMPORTANT NOTE:</strong> You have to enter your Banti login information under "Settings" first</div>
  <ol>
    <li>Create a new Wordpress page<img src="<?php echo BANTI_PLUGIN_URL; ?>images/add-new-page.png" style="display:block;"></li>
    <li>Title the page something like "Album Proofing"</li>
    <li>Insert this shortcode
      <pre style="display:inline">[banti-album-proofing]</pre>
      where you'd like Banti to appear.</li>
    <li>Publish the page and press preview to see how Banti integrates within your website
      <ul>
        <li><b>NOTE:</b> Since you're logged in as an administrator, the preview will show your admin panel. For a client preview: log out of Wordpress, clear your cookies, and go to the page you created to log in as one of your clients. </li>
        <li><b>TIP: </b>You can also load the page in a different browser to login as a client.</li>
      </ul>
    </li>
  </ol>
</div>
