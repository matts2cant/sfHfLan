<?php use_stylesheet('registration.css') ?>
<?php slot('title', 'hf.lan &raquo; Confirmation'); ?>

<div class="page-header">
  <h1>
    Inscriptions
    <small>
      Confirmation
    </small>
  </h1>
</div>
<br/>
Félicitations ! Vous êtes maintenant inscrit à la hf-lan.<br/>
<br/>
Un email précisant les URLs vous permettant d'éditer vos information, ou de vous désinscrire, vous à été envoyé.<br/>
<br/>
Voici également quelques points importants à ne pas oublier :<br/>

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
