<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php use_stylesheet('bootstrap.css') ?>
<?php use_stylesheet('bootstrap-responsive.css') ?>
<?php use_stylesheet('general.css') ?>
<?php use_stylesheet('fonts.css') ?>
<?php use_stylesheet('countbox.css'); ?>

<?php use_javascript('jquery.countdown.js'); ?>
<?php use_javascript('jquery-1.7.min.js', 'first') ?>
<?php use_javascript('bootstrap.min.js') ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title><?php include_slot('title', 'hf.lan'); ?></title>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <link rel="shortcut icon" href="/favicon.ico"/>
  <?php include_stylesheets() ?>
  <?php include_javascripts() ?>
  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-29190283-1']);
    _gaq.push(['_trackPageview']);

    (function () {
      var ga = document.createElement('script');
      ga.type = 'text/javascript';
      ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(ga, s);
    })();

  </script>
</head>
<body>
<div class="topline"></div>
<div class="container">
  <div id="header">
  </div>
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="#">&nbsp;</a>
        <div class="nav-collapse">
          <ul class="nav">
            <?php $nav = sfContext::getInstance()->getRequest()->getParameter("nav", "home");?>
            <li class="<?php echo $nav == "home" ? "active" : ""; ?>">
              <a href="<?php echo url_for("home/index"); ?>"><i class="icon-home icon-white"></i> Accueil</a>
            </li>
            <li class="<?php echo $nav == "info" ? "active" : ""; ?>">
              <a href="<?php echo url_for("infos/index"); ?>">Informations</a>
            </li>
            <li class="<?php echo $nav == "rules" ? "active" : ""; ?>">
              <a href="<?php echo url_for("rules/index"); ?>">Règlements</a>
            </li>
            <li class="<?php echo $nav == "blog" ? "active" : ""; ?>">
              <a href="<?php echo url_for("blog/list"); ?>">Blog</a>
            </li>
            <li class="<?php echo $nav == "partner" ? "active" : ""; ?>">
              <a href="<?php echo url_for("partners/index"); ?>">Partenaires</a>
            </li>
            <li class="<?php echo $nav == "access" ? "active" : ""; ?>">
              <a href="<?php echo url_for("access/index"); ?>">Accès</a>
            </li>
            <li class="<?php echo $nav == "contact" ? "active" : ""; ?>">
              <a href="<?php echo url_for("contact/index"); ?>">Contact</a>
            </li>
            <li class="<?php echo $nav == "archives" ? "active" : ""; ?>">
              <a href="<?php echo url_for("archives/index"); ?>">Archives</a>
            </li>
            <li class="last <?php echo $nav == "live" ? "active" : ""; ?>">
              <a href="<?php echo url_for("live/index"); ?>">Live</a>
            </li>
            <li class="<?php echo $nav == "reg" ? "active" : ""; ?>">
              <a href="<?php echo url_for("registration/index"); ?>">Inscriptions</a>
            </li>
          </ul>
          <form class="navbar-search pull-right" method="post" name="search_form" action="<?php echo url_for("blog/search"); ?>">
            <input type="text" name="search" class="search-query" placeholder="Search">
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php if ($sf_user->hasFlash('notice')): ?>
  <div class="alert alert-info">
    <a class="close" data-dismiss="alert" href="#">×</a>
    <?php echo $sf_user->getFlash('notice') ?>
  </div>
  <?php endif ?>

  <?php if ($sf_user->hasFlash('error')): ?>
  <div class="alert alert-error">
    <a class="close" data-dismiss="alert" href="#">×</a>
    <?php echo $sf_user->getFlash('error') ?>
  </div>
  <?php endif ?>
  <div class="row">
    <div class="span9">
      <?php echo $sf_content;?>
    </div>
    <div class="span3">
      <?php include_component("boxes", "partnersbox"); ?>
      <?php include_partial("global/infobox"); ?>
      <?php include_component("boxes", "countbox"); ?>
    </div>
  </div>
  <hr/>
</div>
</body>
</html>
