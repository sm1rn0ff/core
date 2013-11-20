<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?php echo $charset; ?>" />
        <title><?php echo $titre; ?></title>
        <?php foreach($css as $url): ?>
                <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>">
        <?php endforeach; ?>
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="main-wrapper">
            <?php  echo $output; ?>
        </div>
        <?php foreach($js as $url): ?>
                <script type="text/javascript" src="<?php echo $url; ?>"></script>
        <?php endforeach; ?>
    </body>
</html>