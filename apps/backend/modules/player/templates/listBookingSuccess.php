<h2 class="mbl">
  Booking
</h2>

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

<form method="post" action="<?php echo url_for("player/ListBooking"); ?>">
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