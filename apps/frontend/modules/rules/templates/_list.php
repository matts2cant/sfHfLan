<h3>Règlement généraux :</h3>
<ul>
    <li>
        Charte d'inscription hf.lan
        <a href="/files/charte.pdf">&raquo; Télécharger</a>
    </li>
    <li>
        Fiche d'autorisation pour les mineurs (à faire signer par un représentant légal)
        <a href="/files/autorisation_parentale.pdf">&raquo; Télécharger</a>
    </li>
</ul>
<hr/>
<h3>Règlements de Jeux :</h3>
<ul>
<?php foreach($games as $game): ?>
    <li>
        <?php echo $game->getName(); ?>
        <a href="<?php echo "/uploads/games/rules/".$game->getRules(); ?>">&raquo; Télécharger</a>
    </li>
<?php endforeach; ?>
</ul>
