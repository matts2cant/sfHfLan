<div class="news">
    <h2>
        <?php echo $article->getTitle();?>
    </h2>
    <div class="date">
        News parue le <?php echo $article->getDateTimeObject('created_at')->format('d-m-Y');?>
        à <?php echo $article->getDateTimeObject('created_at')->format('H:m');?>
    </div>
    <br/>
    <p><?php echo $article->getContent();?></p>
    <br/>
    <div class="back">
        <a href="<?php echo url_for("blog/list"); ?>">&laquo; Tous les articles de blog</a>
    </div>
    
    <?php if($article->getUrl() != null): ?>
    <div class="follow">
        <a href="<?php echo $article->getUrl(); ?>">Suivre le lien &raquo;</a>
    </div>
    <?php endif; ?>
    <div class="clear"></div>
</div>