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
    <div class="alert alert-block">
        <h3>Les adresses mail doivent être valides !</h3>
        <p>L'adresse mail de chaque joueur doit être valide affin de confirmer l'inscription de l'équipe. Un message contenant toutes vos informations personelles ainsi que vos lien pour modifier/suprimer votre profile vous serrons envoyé.</p>
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
