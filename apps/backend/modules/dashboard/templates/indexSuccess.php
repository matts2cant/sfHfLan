<h1>Que voulez-vous faire ?</h1>
<div class="dash-pannel">
<h3>&raquo; Gérer le contenu du site</h3>
  <div class="dash-button" onclick="location.href='<?php echo url_for("@article"); ?>';" style="cursor: pointer;">
    <img src="/images/dash/news.png"/>
      <h3>News</h3>
  </div>
  <div class="dash-button" onclick="location.href='<?php echo url_for("@partner"); ?>';" style="cursor: pointer;">
    <img src="/images/dash/partner.png"/>
      <h3>Partenaires</h3>
  </div>
  <div class="clear"></div>
  <h3>&raquo; Gérrer les lans</h3>
  <div class="dash-button" onclick="location.href='<?php echo url_for("@event"); ?>';" style="cursor: pointer;">
    <img src="/images/dash/event.png"/>
      <h3>Évènements</h3>
  </div>
  <div class="dash-button" onclick="location.href='<?php echo url_for("@tournament"); ?>';" style="cursor: pointer;">
    <img src="/images/dash/tournament.png"/>
      <h3>Tournois</h3>
  </div>
  <div class="dash-button" onclick="location.href='<?php echo url_for("@game"); ?>';" style="cursor: pointer;">
    <img src="/images/dash/game.png"/>
      <h3>Jeux</h3>
  </div>
  <div class="dash-button" onclick="location.href='<?php echo url_for("@player"); ?>';" style="cursor: pointer;">
    <img src="/images/dash/player.png"/>
      <h3>Joueurs</h3>
  </div>
  <div class="clear"></div>
  <h3>&raquo; Gérer les accès admin</h3>
  <div class="dash-button" onclick="location.href='<?php echo url_for("guard/users"); ?>';" style="cursor: pointer;">
    <img src="/images/dash/user.png"/>
      <h3>Utilisateurs</h3>
  </div>
  <div class="dash-button" onclick="location.href='<?php echo url_for("guard/groups"); ?>';" style="cursor: pointer;">
    <img src="/images/dash/group.png"/>
      <h3>Groupes</h3>
  </div>
  <div class="dash-button" onclick="location.href='<?php echo url_for("guard/permissions"); ?>';" style="cursor: pointer;">
    <img src="/images/dash/access.png"/>
      <h3>Permissions</h3>
  </div>
  <div class="clear"></div>
</div>