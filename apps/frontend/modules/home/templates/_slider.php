<?php use_helper('Text') ?>

<div id="myCarousel" class="carousel slide">
  <div class="carousel-inner">
    <?php if(count($sliderArticles) > 0): ?>
    <?php $isFirst = true; ?>
      <?php foreach($sliderArticles as $actu):?>
      <div class="item<?php echo $isFirst ? " active" : ""; ?>">
      <?php $isFirst = false; ?>
        <img src="<?php echo $actu->getThumbnail(); ?>" width="100%" alt="">
        <div class="carousel-caption">
          <h4><a href="<?php echo url_for('blog_view', $actu); ?>"><?php echo $actu->getTitle(); ?></a></h4>
          <p><?php echo truncate_text(strip_tags($actu->getContent(ESC_RAW)), 140, "..."); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
</div>



