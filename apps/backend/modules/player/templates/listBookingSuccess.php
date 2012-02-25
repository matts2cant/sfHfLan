<h1>Gestion des réservations</h1>

<form method="post" action="<?php echo url_for("player/listBooking"); ?>">
  <table class="booking">
    <?php echo $form; ?>
  </table>
  <tr>
    <td></td>
    <td>
      <input type="submit" />
    </td>
  </tr>
</form>