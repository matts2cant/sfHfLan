<?php use_stylesheet('registration.css') ?>
<?php slot('title', 'hf.lan &raquo; Edition joueur'); ?>

<div class="page-header">
  <h1>
    Inscriptions
    <small>
      Edition d'un joueur
    </small>
  </h1>
</div>
<form method="post" action="<?php echo url_for("registration_edit_player", array("token" => $player->getToken())); ?>">
  <table class="table">
    <?php echo $form ?>
    <tr>
      <td colspan=2 class="submit-cell">
        <input class="btn btn-primary" type="submit" value="Enregistrer"/>
        <a class="btn btn-danger" href="<?php echo url_for("registration_cancel_player", array("token" => $player->getToken())); ?>" onclick="return confirm('Etes-vous certain de vouloir vous désinscrire ?')">
          Se désinscrire
        </a>
      </td>
    </tr>
  </table>
</form>
