<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php use_stylesheet('backend.css', 'first') ?>
<?php use_stylesheet('icons.css') ?>
<?php use_stylesheet('fonts.css') ?>
<?php use_javascript('tiny_mce/tiny_mce.js') ?>

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
              <a href="<?php echo url_for("dashboard/index"); ?>">
                <img src="/images/logo.png"/>
              </a>
            </div>
            <?php if ($sf_user->isAuthenticated()): ?>
            <div id="menu">
                <ul>
                    <li><img src="/images/icons/page_white_edit.png"/>
                        Contenu
                        <ul>
                            <li>&raquo; <?php echo link_to('Articles', 'article') ?> </li>
                            <li>&raquo; <?php echo link_to('Partenaires', 'partner') ?> </li>
                        </ul>
                    </li>
                    <li><img src="/images/icons/joystick.png"/>
                        Lans
                        <ul>
                            <li>&raquo; <?php echo link_to('Évènements', 'event') ?> </li>
                            <li>&raquo; <?php echo link_to('Tournois', 'tournament') ?> </li>
                            <li>&raquo; <?php echo link_to('Jeux', 'game') ?> </li>
                            <li>&raquo; <?php echo link_to('Joueurs', 'player') ?> </li>
                        </ul>
                    </li>
                    <li><img src="/images/icons/user.png"/>
                        Utilisateurs
                        <ul>
                            <li>&raquo; <?php echo link_to('Utilisateurs', 'guard/users') ?> </li>
                            <li>&raquo; <?php echo link_to('Groupes', 'guard/groups') ?> </li>
                            <li>&raquo; <?php echo link_to('Permissions', 'guard/permissions') ?> </li>
                        </ul>
                    </li>
                    <li><img src="/images/icons/world_link.png"/>
                      Liens
                      <ul>
                        <li>&raquo; <a href="http://www.hf-lan.fr">Site hf.lan</a></li>
                        <li>&raquo; <a href="http://redmine.hf-lan.fr">Redmine</a></li>
                        <li>&raquo; <a href="http://mail.hf-lan.fr">Boite mail</a></li>
                      </ul>
                    </li>
                </ul>
            </div>
            <?php endif; ?>
            <div class="content">
                <?php if ($sf_user->isAuthenticated()): ?>
                <div class="right">
                  <?php echo $sf_user->getName(); ?> - <?php echo link_to('Se déconnecter', 'sf_guard_signout') ?>
                </div>
                <?php endif; ?>
                <?php echo $sf_content;?>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </body>
</html>
