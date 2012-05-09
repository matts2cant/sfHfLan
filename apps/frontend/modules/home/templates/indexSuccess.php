<?php slot('title', 'hf.lan &raquo; Accueil'); ?>

<?php if($sliderArticles->count() != 0): ?>
<?php include_partial("slider", array('sliderArticles' => $sliderArticles)); ?>
<?php endif; ?>
<?php include_partial("news", array('blogArticles' => $blogArticles)); ?>