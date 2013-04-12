<?php slot('title', 'hf.lan &raquo; Informations'); ?>

<div class="page-header">
  <h1>Informations</h1>
</div>

<p>
  <?php if ($isUpComing): ?>
    La prochaine HF-LAN se déroulera du
    <strong>
      <?php echo $startDate;?> (à <?php echo $startTime;?>)
      au <?php echo $endDate;?> (à <?php echo $endTime;?>)
    </strong>.
  <?php else: ?>
    <strong>
      La date de la prochaine HF-LAN n'est pas encore fixée.
    </strong>
  <?php endif; ?>

  Elle se situe dans l'école ESIEE Paris dont vous trouverez les coordonnées et un plan dans la rubrique
  <a href="<?php echo url_for("access/index");?>">accès</a>.
 Il s'agit d'une LAN BYOC ("Bring your own computer" ou "Amenez votre propre PC").
</p>

<?php if ($isUpComing): ?>
    Nous vous proposerons <?php echo $event->getTournaments()->count(); ?> tournois avec plus de
    <strong><?php echo $sum . "€" ?></strong>
    de prize-pool et se déroulant sur tout le weekend :
    <ul>
      <?php foreach ($event->getTournaments() as $tournament): ?>
        <li>
          <strong><?php echo $tournament->getName(); ?></strong><br/>
          <?php if ($tournament->hasGame()): ?>
            <p style="padding-left:20px;">
              <?php if ($tournament->getGame()->getPlayersPerTeam() == 1): ?>
                Places : <?php echo $tournament->getNumberOfTeams(); ?> joueurs<br/>
              <?php else: ?>
                Places : <?php echo $tournament->getNumberOfTeams(); ?> équipes
                de <?php echo $tournament->getGame()->getPlayersPerTeam(); ?> joueurs<br/>
              <?php endif;?>
              Prize-pool : <?php echo $tournament->getPrizePool(); ?>€<br/>
              <?php if ($tournament->getIsSubtournamentEnabled()): ?>
                &#8627; <?php echo "Optionnel : " . $tournament->getSubtournamentName(); ?>
                (Prize-Pool : <?php echo $tournament->getSubtournamentPrizePool(); ?> €)<br/>
              <?php endif;?>
              <a href="/uploads/games/rules/<?php echo $tournament->getGame()->getRules(); ?>"/>&raquo; Lire le réglement</a>
            </p>
          <?php else: ?>
            <p style="padding-left:20px;">
              Places : <?php echo $tournament->getNumberOfTeams(); ?> personnes
            </p>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <p>
    Jouez également à tous les jeux que vous voulez !
  </p>
<?php endif; ?>
<hr/>
<h2>
  Ce qui vous plaira
</h2>
<ul>
  <li>20 membres hyperactifs, compétents et sympathiques</li>
  <li>Une centralisation des commandes de repas (pizzas, mcdos) pour le repas du samedi soir</li>
  <li>Des repas prévus pour samedi et dimanche, à midi.</li>
  <li>Un réfectoire très spacieux pour vous accueillir</li>
  <li>Un lieu extrêmement bien desservi par le RER A</li>
  <li>Une connexion Internet en fibre optique dédiée pour l'évènement</li>
  <li>Un amphithéâtre-cinéma spacieux et confortable où seront retransmis les matchs</li>
  <li>Une infrastructure électricité et réseau mise en place entièrement</li>
  <li>Une stream live pour retransmettre les matchs à l’extérieur de l’évènement</li>
  <li>Des boissons gratuites!</li>
</ul>
<div class="center">
  <a href="/images/infos/marcel_front.jpg" rel="lightbox[1]"><img src="/images/infos/mini_marcel_front.png"/></a>
  <a href="/images/infos/marcel_back.jpg" rel="lightbox[1]"><img src="/images/infos/mini_marcel_back.png"/></a>
  <br/>
  <small>
    Amphitheatre M.Dassault - ESIEE
  </small>
</div>
<div class="center">
  <a href="/images/infos/cantine1.jpg" rel="lightbox[2]"><img src="/images/infos/mini_cantine1.png"/></a>
  <a href="/images/infos/cantine2.jpg" rel="lightbox[2]"><img src="/images/infos/mini_cantine2.png"/></a>
  <br/>
  <small>
    Salle de jeu - ESIEE
  </small>
</div>
<hr/>
<h2>
  Inscription
</h2>
<p>
  Les inscriptions ouvriront 1 mois avant le début des festivités.<br/>
  Elles comprennent:
</p>
<ul>
  <li>Le déjeuner de samedi midi</li>
  <li>La possibilité de dormir sur place (en prévoyant le materiel nécessaire : sac de couchage, duvet ...)</li>
  <li>Le petit déjeuner le dimanche matin</li>
  <li>Le déjeuner du dimanche midi</li>
  <li>Des boissons gratuites tout le week-end !</li>
</ul>
<?php if ($isUpComing): ?>
  <p>
    Les tarifs sont :
  </p>
  <ul>
    <?php foreach ($event->getTournaments() as $tournament): ?>
    <li>Pass <?php echo $tournament->getName(); ?> :
      <?php echo $event->getEntryPrice(); ?>€(entrée)
      <?php if ($tournament->getInscriptionPrice() > 0): ?>
        + <?php echo $tournament->getInscriptionPrice(); ?>€(prize-pool)
        <?php endif;?>
      <br/>
      <?php if ($tournament->getIsSubtournamentEnabled()): ?>
        <?php
        $stName = "Optionnel : " . $tournament->getSubtournamentName();
        if ($tournament->getSubtournamentInscriptionPrice() > 0)
        {
          $stName .= " (+" . $tournament->getSubtournamentInscriptionPrice() . "€)";
        }
        else
        {
          $stName .= " (Gratuit)";
        }
        ?>
        &#8627; <?php echo $stName; ?>
        <?php endif;?>
    </li>
    <?php endforeach; ?>
  </ul>
  <p>
  Ces prix sont sujets à modifications d'ici l'ouverture des inscriptions.
  </p>
<?php endif; ?>
<p>
  Les inscriptions seront closes deux jours avant le debut de l'évènement,
  afin de valider la liste des participants.
</p>
<hr/>
<h2>
  Le paiement
</h2>
<p>
  Deux méthodes de paiement sont disponibles :
</p>
<ul>
  <li>Au BDE Esiee Engineering (voir section <a href="<?php echo url_for("access/index");?>">accès</a>)</li>
  <li>Sur place le jour de l'évènement (Par CB ou espèces)</li>
</ul>
<hr/>
<h2>
  A ne pas oublier
</h2>
<ul>
  <li>Vos papiers d'identité (contrôles à l'entrée)</li>
  <li>Une autorisation parentale avec photocopie de la carte d'identité d'un représentant légal si vous êtes
    mineur
  </li>
  <li>Un câble réseau droit RJ45 6 mètres au moins (Vendus en ligne durant l'inscription)</li>
  <li>Casque audio ou écouteurs (les enceintes étant interdites)</li>
  <li>Votre manette de gamecube pour les joueurs de Smash Bros.</li>
  <li>Votre PC, écran, périphériques et câbles requis pour son bon fonctionnement (LAN BYOC)</li>
</ul>