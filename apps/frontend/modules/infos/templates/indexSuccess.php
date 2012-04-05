<?php slot('title', 'hf.lan &raquo; Informations'); ?>

<div class="left">
  <div class="content">
    <h1>INFORMATIONS</h1>
    <br/>

    <?php if ($isUpComing): ?>
    La prochaine HF-LAN se déroulera du
    <strong>
      <?php
      $start = strtotime($event->getStartsAt());
      $finish = strtotime($event->getFinishesAt());
      setlocale(LC_TIME, 'fr_FR');
      if (strftime("%Y", $start) == strftime("%Y", $finish)) {
        if (strftime("%m", $start) == strftime("%m", $finish)) {
          echo strftime("%d", $start);
        }
        else
        {
          echo strftime("%d %B", $start);
        }
      }
      else
      {
        echo strftime("%d %B %Y", $start);
      }
      ?>
      au
      <?php echo strftime("%d %B %Y", $finish);?>
    </strong>.

    <?php else: ?>
    <strong>La date de la prochaine HF-LAN n'est pas encore fixée.</strong>
    <br/>
    <?php endif; ?>


    Elle se situe dans l'école ESIEE Paris dont vous trouverez les coordonnées et un plan dans la rubrique
    <a href="<?php echo url_for("access/index");?>">accès</a>.<br/>
    Il s'agit d'une LAN BYOC ("Bring your own computer" ou "Amenez votre propre PC").<br/>
    <br/>

    <?php if ($isUpComing): ?>
    Nous vous proposerons <?php echo $event->getTournaments()->count(); ?> tournois avec plus de
    <strong>
      <?php
      $sum = 0;
      foreach ($event->getTournaments() as $tournament)
      {
        $sum += $tournament->getPrizePool();
        if($tournament->getIsSubtournamentEnabled())
        {
          $sum += $tournament->getSubtournamentPrizePool();
        }
      }
      echo $sum . "€";
      ?>
    </strong>
    de prize-pool et se déroulant sur tout le weekend :<br/>
    <br/>
    <ul>
      <?php foreach ($event->getTournaments() as $tournament): ?>
      <?php if ($tournament->hasGame()): ?>
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
            <?php if ($tournament->getIsSubtournamentEnabled()): ?>
            &#8627; <?php echo "Optionnel : " . $tournament->getSubtournamentName(); ?>
            <?php echo "(Prize-Pool : " . $tournament->getSubtournamentPrizePool() . " €)"; ?><br/>
            <?php endif;?>
            <a href="/uploads/games/rules/<?php echo $tournament->getGame()->getRules(); ?>"/>&raquo; Lire le
            réglement</a><br/>
          </p><br/>
        </li>
        <?php else: ?>
        <li>
          <strong><?php echo $tournament->getName(); ?></strong><br/>

          <p style="padding-left:20px;">
            Places : <?php echo $tournament->getNumberOfTeams(); ?> personnes<br/>
          </p><br/>
        </li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
    <br/>
    Jouez également à tous les jeux que vous voulez !
    <br/>
    <?php else: ?>

    <?php endif; ?>
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
    <br/>
    <center>
      <a href="/images/infos/marcel_front.jpg"><img src="/images/infos/mini_marcel_front.png"/></a>
      <a href="/images/infos/marcel_back.jpg"><img src="/images/infos/mini_marcel_back.png"/></a>
      <br/>
      <small>
        Amphitheatre M.Dassault - ESIEE
      </small>
    </center>
    <br/>
    <center>
      <a href="/images/infos/cantine1.jpg"><img src="/images/infos/mini_cantine1.png"/></a>
      <a href="/images/infos/cantine2.jpg"><img src="/images/infos/mini_cantine2.png"/></a>
      <br/>
      <small>
        Salle de jeu - ESIEE
      </small>
    </center>
    <br/>
    <br/>

    <h2>
      Inscription
    </h2>

    Les inscriptions ouvriront 1 mois avant le début des festivités.<br/>
    Elles comprennent:<br/>
    <ul>
      <li>Le déjeuner de samedi midi</li>
      <li>Le petit déjeuner le dimanche matin</li>
      <li>Le déjeuner du dimanche midi</li>
      <li>Des boissons gratuites tout le week-end !</li>
    </ul>
    <br/>
    <?php if ($isUpComing): ?>
    Les tarifs sont :
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
          if ($tournament->getSubtournamentInscriptionPrice() > 0) {
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
    <br/>
    Ces prix sont sujets à modifications d'ici l'ouverture des inscriptions.<br/>
    <br/>
    <?php endif; ?>
    Les inscriptions seront closes deux jours avant le debut de l'évènement,
    afin de valider la liste des participants.<br/>
    <br/>

    <h2>
      Le paiement
    </h2>
    Trois méthodes de paiement sont disponibles :
    <ul>
      <li>En ligne par PayPal</li>
      <li>Au BDE Esiee Engineering (voir section <a href="<?php echo url_for("access/index");?>">accès</a>)</li>
      <li>Sur place le jour de l'évènement (Par CB ou espèces)</li>
    </ul>
    <br/>

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
    <br/>
  </div>
</div>
<div class="right">
  <?php include_partial("global/infobox"); ?>
  <?php include_component("boxes", "countbox"); ?>
</div>