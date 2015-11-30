<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<?php $template->setMasterPage('master.php') ?>
<?php $template->setTitle("title override"); ?>

<div id="container">
	<h1>This is Style2</h1>

	<div id="main">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>
<!--        <img src="<?php echo $template->img('a.png',true) ?>" width="100" height="50"/>-->
        <?php echo VIEWPATH ?>
        <?php echo $template->img('a.png',false,100,50); ?>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>