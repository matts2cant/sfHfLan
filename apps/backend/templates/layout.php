<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php use_stylesheet('backend.css', 'first') ?>
<?php use_stylesheet('fonts.css') ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>hf.lan</title>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body>
        <div id="topline"></div>
        <div id="page">
            <div id="header">
            </div>
            <div id="menu">
                <?php echo link_to('Articles', 'article') ?> 
                <?php echo link_to('Catégories', 'category') ?> 
                <?php echo link_to('Évènements', 'event') ?> 
                <?php echo link_to('Tournois', 'tournament') ?> 
                <?php echo link_to('Jeux', 'game') ?>
                <?php echo link_to('Partenaires', 'partner') ?>
            </div>
            <div class="content">
                <?php echo $sf_content;?>
                <div class="clear"></div>
            </div>
        </div>
    </body>
</html>
