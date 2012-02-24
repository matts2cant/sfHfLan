<?php slot('title', 'hf.lan &raquo; Accueil'); ?>

<div class="left">
    <?php if($sliderArticles->count() != 0): ?>
    <?php include_partial("slider", array('sliderArticles' => $sliderArticles)); ?>
    <?php endif; ?>
    <?php include_partial("news", array('blogArticles' => $blogArticles, 'games' => $games)); ?>
</div>
<div class="right">
    <?php include_partial("global/infobox"); ?>
    <?php include_component("boxes","countbox"); ?>
</div>