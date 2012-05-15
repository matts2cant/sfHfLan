<!DOCTYPE html>
<html lang="<?php echo $sf_user->getCulture() ?>">
  <head>
    <?php include_title() ?>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_javascripts() ?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <?php include_stylesheets() ?>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body>
    <?php include_component('sfTwitterBootstrap', 'header'); ?>

    <div class="container-fluid">
      <?php echo $sf_content ?>
    </div>

    <script>$(function () { prettyPrint() })</script>

  </body>
</html>
