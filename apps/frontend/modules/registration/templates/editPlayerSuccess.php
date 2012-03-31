<?php use_stylesheet('registration.css') ?>
<?php slot('title', 'hf.lan &raquo; Edition joueur'); ?>
<div class="left">
  <div class="content">
    <h1>INSCRIPTIONS</h1>
    <h2>Edition de votre inscription</h2>
    <form method="post" action="<?php echo url_for("registration_edit_player", array("token" => $player->getToken())); ?>">
      <table>
        <?php echo $form ?>
        <tr>
          <td colspan=2 class="submit-cell">
            <input type="submit" value="Enregistrer"/>
            <br/>
          </td>
        </tr>
      </table>
    </form>
    <h2>Annulation de votre inscription</h2>
    <div class="cancel-registration">
      <a href="<?php echo url_for("registration_cancel_player", array("token" => $player->getToken())); ?>" onclick="return confirm('Etes-vous certain de vouloir vous désinscrire ?')">
        &raquo; Cliquez-ici &laquo;
      </a>
    </div>
  </div>
</div>
<div class="right">
  <?php include_partial("global/infobox"); ?>
  <?php include_component("boxes", "countbox"); ?>
</div>
