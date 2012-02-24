<?php
  $steps = array(
    "Choix du tournoi",
    "Informations joueur(s)",
    "Confirmation",
  );
?>

<div class="progress">
  <?php for($i = 0; $i < count($steps); $i++):?>
  <span class="step<?php if($i == $current_step) echo " current";?>">
    <?php echo $steps[$i];?>
  </span>
  <?php if($i != count($steps)-1):?>&raquo;<?php endif; ?>
  <?php endfor; ?>
</div>