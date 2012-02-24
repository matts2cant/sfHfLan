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
      <?php include_component('sfAdminDash','header'); ?>
      <?php echo $sf_content ?>
      <?php include_partial('sfAdminDash/footer'); ?>
    </body>
</html>
