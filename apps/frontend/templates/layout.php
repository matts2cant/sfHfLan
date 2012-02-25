<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php use_stylesheet('frontend.css', 'first') ?>
<?php use_stylesheet('header.css') ?>
<?php use_stylesheet('fonts.css') ?>
<?php use_stylesheet('footer.css') ?>
<?php use_stylesheet('menu.css') ?>

<?php use_javascript('jquery-1.7.min.js', 'first') ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title><?php include_slot('title', 'hf.lan'); ?></title>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <link rel="shortcut icon" href="/favicon.ico"/>
  <?php include_stylesheets() ?>
  <?php include_javascripts() ?>
</head>
<body>
<div id="topline"></div>
<div id="page">
  <div id="header">
    <a href="<?php echo url_for("home/index"); ?>">
      <img src="/images/logo.png"/>
    </a>
    <div id="headermenu">
      <div id="loginbox">
        &nbsp;
      </div>
      <div id="searchbox">
        <form method="post" name="search_form" action="<?php echo url_for("blog/search"); ?>">
          <ul>
            <li><input class="input" name="search" value="Rechercher sur le site"
                       onfocus="if(this.value=='Rechercher sur le site') {this.value='';}"
                       onblur="if(this.value=='') {this.value='Rechercher sur le site';}" type="text"></input></li>
            <li><a href="#" onClick="document['search_form'].submit()">Rechercher</a></li>
          </ul>
        </form>
      </div>
    </div>
  </div>
  <div id="menu">
    <ul>
      <li><a href="<?php echo url_for("home/index"); ?>">Accueil</a></li>
      <li><a href="<?php echo url_for("infos/index"); ?>">Informations</a></li>
      <li><a href="<?php echo url_for("blog/list"); ?>">Blog</a></li>
      <li><a href="<?php echo url_for("archives/index"); ?>">Archives</a></li>
      <li><a href="<?php echo url_for("partners/index"); ?>">Partenaires</a></li>
      <li><a href="<?php echo url_for("access/index"); ?>">Accès</a></li>
      <li><a href="<?php echo url_for("contact/index"); ?>">Contact</a></li>
      <li class="last"><a href="<?php echo url_for("registration/index"); ?>">Inscriptions</a></li>
    </ul>
    <div style="clear: both"></div>
  </div>

  <?php if ($sf_user->hasFlash('notice')): ?>
  <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
  <?php endif ?>

  <?php if ($sf_user->hasFlash('error')): ?>
  <div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
  <?php endif ?>

  <?php echo $sf_content;?>
  <div id="footer">
    <table>
      <tr>
        <th>Accès direct</th>
        <th>Espace utilisateur</th>
        <th>Business</th>
        <th>Contactez nous</th>
      </tr>
      <tr>
        <td>
          Nous rencontrer<br/>
          Brochure<br/>
          Accès<br/>
          Visite virtuelle
        </td>
        <td>
          Accueil<br/>
          Créer une team<br/>
          Mot de passe<br/>
          Inscription
        </td>
        <td>
          Plaquette commerciale<br/>
          Sponsoring<br/>
          Presse
        </td>
        <td>
          01 45 92 65 00<br/>
          Google maps
        </td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>
