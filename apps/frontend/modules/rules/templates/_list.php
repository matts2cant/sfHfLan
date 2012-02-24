<h2>Règlement généraux :</h2>
<br/>
<ul>
    <li>
        Charte d'inscription hf.lan
        <a href="/files/charte.pdf">&raquo; Télécharger</a>
    </li>
</ul>
<hr/>
<br/>
<h2>Règlements de Jeux :</h2>
<br/>
<ul>
<?php foreach($games as $game): ?>
    <li>
        <?php echo $game->getName(); ?>
        <a href="<?php echo "/uploads/games/rules/".$game->getRules(); ?>">&raquo; Télécharger</a>
    </li>
<?php endforeach; ?>
</ul>
