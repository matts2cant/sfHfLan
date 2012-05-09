<div class="news">
  <h2>
    <?php echo $article->getTitle();?>
  </h2>
  <p>
    <small>
      Article paru le <?php echo $article->getDateTimeObject('created_at')->format('d-m-Y');?>
      à <?php echo $article->getDateTimeObject('created_at')->format('H:m');?>
    </small>
  </p>
  <div class="row">
    <div class="span6">
      <p class="rich-text-box">
        <?php echo $article->getContent(ESC_RAW);?>
      </p>
    </div>
    <div class="span3">
      <?php if ($article->getImage() != ''): ?>
      <a class="thumbnail" href="/uploads/articles/<?php echo $article->getImage()?>">
        <img src="/uploads/articles/<?php echo $article->getImage(); ?>" alt/>
      </a>
      <?php endif; ?>
    </div>
  </div>
  <hr/>
  <ul class="pager">
      <li class="previous"><a href="<?php echo url_for("blog/list"); ?>">&laquo; Tous les articles de blog</a></li>
    <?php if ($article->getUrl() != ''): ?>
      <li class="next"><a href="<?php echo $article->getUrl(); ?>">Suivre le lien &raquo;</a></li>
    <?php endif; ?>
  </ul>
</div>