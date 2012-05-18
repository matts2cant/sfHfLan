<?php slot('title', 'hf.lan &raquo; Live'); ?>

<div class="page-header">
  <h1>Live</h1>
</div>
<div class="tabbable">
  <ul class="nav nav-tabs">
    <?php
    $first = true;
    $i = 1;
    foreach ($tournaments as $tournament): ?>
      <li <?php echo $first ? 'class="active"' : '';?>><a href="#tab<?php echo $i; ?>"
                                                          data-toggle="tab"><?php echo $tournament->getGame()->getName(); ?></a>
      </li>
      <?php
      $first = false;
      $i++; endforeach; ?>
  </ul>
  <div class="tab-content">
    <?php
    $first = true;
    $i = 1;
    foreach ($tournaments as $tournament): ?>
      <div class="tab-pane<?php echo $first ? ' active' : '';?>" id="tab<?php echo $i; ?>">
        <?php if($tournament->getEmbeddedPlayer() != ""):?>
        <div>
          <?php echo $tournament->getEmbeddedPlayer(ESC_RAW); ?>
        </div>
        <?php endif; ?>
        <?php if($tournament->getBracketImage() != ""):?>
          <ul class="pager">
            <li><a class="other" href="<?php echo "/uploads/tournaments/brackets/".$tournament->getBracketImage(); ?>">Consulter l'arbre du tournoi</a></li>
          </ul>
        <?php endif; ?>
      </div>
      <?php
      $first = false;
      $i++; endforeach; ?>
    <div class="tab-pane active" id="tab1">
    </div>
    <div class="tab-pane" id="tab2">
    </div>
  </div>
</div>
<hr/>
<?php include_partial("chat/chat"); ?>