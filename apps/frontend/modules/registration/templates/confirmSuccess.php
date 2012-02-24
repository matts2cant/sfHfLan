<?php use_stylesheet('registration.css') ?>
<?php slot('title', 'hf.lan &raquo; Confirmation'); ?>

<div class="left">
  <div class="content">
    <h1>INSCRIPTIONS</h1>
    <?php include_partial("registration/progress", array("current_step" => 2)); ?>
  <br/>
  <center>
    <strong>
      Félicitations ! Vous êtes maintenant inscrit à la hf-lan<br/>
      <br/>
      Voici cependant quelques points importants à ne pas oublier :<br/>
    </strong>
  </center>
  <br/>

  <h2>
    Consultez les règlements des tournois
  </h2>
  <?php if ($isUpComing): ?>
  <ul>
    <?php foreach ($event->getTournaments() as $tournament): ?>
    <?php if ($tournament->getGameId()): ?>
      <li>
        <strong><?php echo $tournament->getName(); ?></strong><br/>

        <p style="padding-left:20px;">
          <?php if ($tournament->getGame()->getPlayersPerTeam() == 1): ?>
          Places : <?php echo $tournament->getNumberOfTeams(); ?> joueurs<br/>
          <?php else: ?>
          Places : <?php echo $tournament->getNumberOfTeams(); ?> équipes
          de <?php echo $tournament->getGame()->getPlayersPerTeam(); ?> joueurs<br/>
          <?php endif;?>

          Prize-pool : <?php echo $tournament->getPrizePool(); ?>€<br/>
          <a href="/uploads/games/rules/<?php echo $tournament->getGame()->getRules(); ?>"/>&raquo; Lire le
          réglement</a>
        </p>
      </li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>
  <br/>
  <?php endif;?>
  <br/>

  <h2>
    N'oubliez pas d'apporter ...
  </h2>
  <ul>
    <li>Vos papiers d'identité (contrôles à l'entrée)</li>
    <li>Une autorisation des représentants légaux si vous êtes mineur</li>
    <li>Un câble réseau droit RJ45 6 mètres au moins (Vendus sur place si nécessaire)</li>
    <li>Casque audio ou écouteurs (les enceintes étant interdites)</li>
    <li>Votre manette de gamecube pour les joueurs de Smash Bros.</li>
    <li>Votre PC, écran, périphériques et câbles requis pour son bon fonctionnement (Lan BYOC)</li>
  </ul>
  <br/>

  <h2>
    Verifiez vos mails régulièrement
  </h2>
  Nous vous tiendrons informés des modalités par mail !
  </div>
</div>
<div class="right">
  <?php include_partial("global/infobox"); ?>
  <?php include_component("boxes", "countbox"); ?>
</div>
