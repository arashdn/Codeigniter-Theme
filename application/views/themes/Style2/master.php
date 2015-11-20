<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $template->getTitle() ?></title>

<!--        <link rel="stylesheet" href="<?php echo $template->css()?>"/>-->
        <?php echo $template->css()?>
<!--        <script src="<?php echo $template->js('test.js',true); ?>"></script>-->
        <?php        echo $template->js('test.js'); ?>
</head>
<body>
    
This is Master page Header

<?php echo $content; ?>

This is Master page footer
</body>
</html>