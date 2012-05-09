<?php use_stylesheet('registration.css') ?>
<?php slot('title', 'hf.lan &raquo; Etape 2'); ?>

<div class="page-header">
  <h1>
    Inscriptions
    <small>
      Informations joueur(s)
    </small>
  </h1>
</div>
<form method="post" action="<?php echo url_for("registration/step2"); ?>">
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
