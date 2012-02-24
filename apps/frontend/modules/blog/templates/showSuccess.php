<?php use_stylesheet('blog.css') ?>
<?php slot('title', 'hf.lan &raquo; Blog'); ?>

<div class="left">
    <div class="content">
        <h1>BLOG</h1>
        <?php include_partial("show", array('article' => $article)); ?>
    </div>
</div>
<div class="right">
    <?php include_partial("global/infobox"); ?>
    <?php include_component("boxes","countbox"); ?>
</div>