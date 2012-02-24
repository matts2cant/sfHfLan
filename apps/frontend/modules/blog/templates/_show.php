<div class="news">
    <h2>
        <?php echo $article->getTitle();?>
    </h2>
    <div class="date">
        Article paru le <?php echo $article->getDateTimeObject('created_at')->format('d-m-Y');?>
        à <?php echo $article->getDateTimeObject('created_at')->format('H:m');?>
    </div>
    <br/>
    <?php if($article->getImage() != ''): ?>
    <a href="/uploads/articles/<?php echo $article->getImage()?>">
        <img src="<?php echo $article->getThumbnail('250x250'); ?>"/>
    </a>
    <?php endif; ?>
    <p class="rich-text-box">
        <?php echo $article->getContent(ESC_RAW);?>
    </p>
    <div class="clear"></div>
    <br/>
    <div class="back">
        <a href="<?php echo url_for("blog/list"); ?>">&laquo; Tous les articles de blog</a>
    </div>
    
    <?php if($article->getUrl() != ''): ?>
    <div class="follow">
        <a href="<?php echo $article->getUrl(); ?>">Suivre le lien &raquo;</a>
    </div>
    <?php endif; ?>
    <div class="clear"></div>
</div>