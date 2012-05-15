<h2 class="mbl">
  Génération de mailing-list
</h2>

<div class="well">
  <?php echo $emails; ?>
</div>

<a class="btn mlm" href="<?php echo url_for("player") ?>"><i class="icon-list-alt"></i> Back to list</a>
<a class="btn btn-primary" href="mailto:<?php echo $link; ?>">Send mail</a>