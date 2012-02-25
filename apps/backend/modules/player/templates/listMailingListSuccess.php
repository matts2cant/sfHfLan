<?php use_stylesheet('code.css') ?>

<h1>Génération de mailing-list</h1>
<h2>Lien</h2>
<a href="mailto:<?php echo $emails; ?>">&raquo; Cliquez ici</a>

<h2>Texte</h2>
<div class="code">
  <?php echo $emails; ?>
</div>
