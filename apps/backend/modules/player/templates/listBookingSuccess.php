<h1>Gestion des réservations</h1>

<?php if ($sf_user->hasFlash('notice')): ?>
<div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
<?php endif ?>

<?php if ($sf_user->hasFlash('error')): ?>
<div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
<?php endif ?>

<form method="post" action="<?php echo url_for("player/listBooking"); ?>">
  <table class="booking">
    <?php echo $form; ?>
    <tr>
      <td></td>
      <td>
        <input type="submit" />
      </td>
    </tr>
  </table>
</form>