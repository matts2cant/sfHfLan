<div id="countbox" class="well">
  <h2>Partenaires</h2>
  <div class="box-partners">
    <?php foreach ($partners as $partner): ?>
      <a href="http://<?php echo $partner->getUrl(); ?>">
        <img alt="<?php echo $partner->getName(); ?>"
             src="/uploads/partners/<?php echo $partner->getLogo(); ?>"/></a>
    <?php endforeach; ?>
  </div>
</div>