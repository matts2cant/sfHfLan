<?php foreach($blogArticles as $article):?>
<div class="news">
    <h4>
        <?php echo $article->getTitle();?>
        <span class="small">
            [ <?php echo $article->getDateTimeObject('created_at')->format('d/m/Y');?> ]
        </span>
    </h4>
    <br/>
    <p><?php echo $article->getContent();?></p>
    <a class="more" href="<?php echo url_for('blog_view', $article); ?>">Lire la suite &raquo;</a>
    <hr/>
</div>
<?php endforeach;?>