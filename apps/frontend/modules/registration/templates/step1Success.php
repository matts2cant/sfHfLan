<?php use_stylesheet('registration.css') ?>
<?php slot('title', 'hf.lan &raquo; Etape 1'); ?>

<div class="page-header">
  <h1>
    Inscriptions
    <small>
      Choix du tournoi
    </small>
  </h1>
</div>
<form method="post" action="<?php echo url_for("registration/step1"); ?>">
  <table class="table">
      <?php echo $form ?>
    <tr>
      <td></td>
      <td>
        <input class="btn btn-primary" type="submit" />
      </td>
    </tr>
  </table>
</form>
