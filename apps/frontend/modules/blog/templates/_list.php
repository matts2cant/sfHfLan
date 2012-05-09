<?php use_helper('Text') ?>
<?php use_helper('Escaping') ?>

<?php foreach($blogArticles as $article):?>
<div class="news">
  <h3><?php echo $article->getTitle();?>
    <span class="small">
      [ <?php echo $article->getDateTimeObject('created_at')->format('d/m/Y');?> ]
    </span>
  </h3>
  <p><?php echo truncate_text(strip_tags($article->getContent(ESC_RAW)), 300, "...");?></p>
  <a class="pull-right" href="<?php echo url_for('blog_view', $article); ?>">&raquo; Lire l'article</a>
  <div style="clear: both;"></div>
</div>
<hr/>
<?php endforeach;?>