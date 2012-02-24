<?php use_stylesheet('registration.css') ?>
<?php slot('title', 'hf.lan &raquo; Edition joueur'); ?>

<div class="left">
  <div class="content">
    <h1>INSCRIPTIONS</h1>
    <form method="post" action="<?php echo url_for("registration_edit_player", array("token" => $player->getToken())); ?>">
      <table>
        <?php echo $form ?>
        <tr>
          <td></td>
          <td>
            <input type="submit" />
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<div class="right">
  <?php include_partial("global/infobox"); ?>
  <?php include_component("boxes", "countbox"); ?>
</div>
